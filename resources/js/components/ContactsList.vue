<template>
<div class="contacts-list">
<ul>
<li v-for="(contact,index) in contacts" :key="contact.id" @click="selectContact(index,contact)" :class="{'selected':index==selected}" style="padding:2px;
   border-bottom:1px solid black;
   position:relative;
   padding-left: 9px;
   cursor:pointer;">
<div class="avatar">
<!--------<img src="{{URL('/images/id.png')}}" :alt="contact.name">---------->
</div>
<div class="contact">
<p class="name" style="margin-bottom: 0px; font-weight:bold;">{{ contact.name }}</p>
<p class="email">{{ contact.email }}</p>
                </div>
                <span class="unread" v-if="contact.unread" style=" background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;">{{ contact.unread }}</span>
                </li>
                </ul>
                </div>
</template>
<script>
export default {

props:{
contacts:{
	
	type:Array,
	default:[]
	
}},
data()
{return{
	
	selected:0
};
},

methods:
{
	selectContact(index,contact)
	{
	this.selected=index;
	this.$emit('selected',contact);
	}
}

	


}
</script>
<style>
.contacts-list {
    flex: 2;
    border-left: 1px solid black;
    max-height:600px;
    overflow:scroll;
    border-left:10;
    background-color: #dee2e6;


   

ul {
    list-style-type: none;
    


    

 
}}


</style>
