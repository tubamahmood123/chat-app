<template>
<div>
<p>{{ po }}</p>
<button v-on:click="fun">Click for reverse kamal</button>

<br>
<input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
  <label for="jack">Jack</label>
  <input type="checkbox" id="john" value="John" v-model="checkedNames">
  <label for="john">John</label>
  <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
  <label for="mike">Mike</label>
  <br>
  <span>Checked names: {{ checkedNames }}</span>
   
  <button v-on:click="say('hi')">Say hi</button>
  <button v-on:click="say('what')">Say what</button>

</div>


</template>
<script>
export default{
data() {
return {
 po:'kamal',
 checkedNames: []
};},
methods:{
fun:function(){
this.po=this.po.split('').reverse().join('')
},

say:function(mes)
{
	alert(mes)
}}
	


}
</script>