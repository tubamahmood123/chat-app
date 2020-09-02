<template>

<div class="conversation" style="flex:5;">
<div style="border-bottom: 1px dashed lightgray;">
<b style="font-size: 20px;">{{ contact ? contact.name :'Select a Contact'}}
        </b>
        <br>

 
<li v-for="se in been">

<b v-if="se.id==contact.id && se.date==date && se.time==time">{{ se ?'Online':' ' }}</b>
<b v-else-if="se.id==contact.id">{{se ? 'Lastseen on '+ se.date : '' }}{{se ?  ' '+se.time :' ' }}</b>
<b v-else></b>
</li>
    
                     </div>
        

<div class="feed" ref="feed" style="background: #f0f0f0;
    height: 550px;
    max-height: 470px;
    overflow: scroll;">
<ul style=" list-style-type: none;
        padding: 5px;">
<li v-for="message in messages" :class="`message${message.to == contact.id ? 'sent' : 'received'}`" :key="message.id" style="margin: 10px 0">
<div id="text" style="max-width: 200px;
                    border-radius: 13px;
                    padding: 6px;
                    display: inline-block;">
{{ message.text }}
<p style=" color: #777777;
            font-size: 12px;
            margin-top:-1px;">{{ message.date}}
{{ message.time }}</p>
</div>
</li>
</ul>
</div>
<MessageComposer @send="sendMessage" />
</div>
</template>
<script>
import MessageComposer from './MessageComposer';

export default {
props:{


contact:{
	
	type:Object
},
messages:
{ 
  type:Array,
  default:[]
   }
},

data()
{return{
  been:null,
  date:null,
  time:null
};
},
created()
{ 

setInterval(() => {


axios.get('/lastseen')
                .then((response) => {
                    this.date = response.data;});
                    axios.get('/lastseentt')
                .then((response) => {
                    this.time = response.data;});
    }, 3000);

setInterval(() => {axios.get(`/lastseentime/${this.contact.id}`)
                .then((response) => {
                    this.been = response.data;
                     
                });
    }, 3000);



},


methods:
{sendMessage(text){

if(!this.contact){
	return;}
	axios.post('/conversation/send',{
	contact_id:this.contact.id,
	text:text
	}).then((response)=>{
	this.$emit('new',response.data);
	})

},
scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },

watch:{
	
	
	messages(messages)
	{
   this.scrollToBottom();

	}
},

components:{MessageComposer }
}
</script>
<style>

                li.messagereceived {
                    text-align: left;
                    
                    }
                
                li.messagesent {
                    text-align: right;
              }     
                    li.messagesent #text{
                    background: #81c4f9;
                    }

                 li.messagereceived #text {
                        background: #b2b2b2;
                    }
              


</style>