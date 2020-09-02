<template>



<ul>
<li v-for="item in items" :key="item.message">
    {{ mes }}
    {{ item.message}}

  </li>
  </ul>

  </template>





<script>


export default{
	
	data: function klp() {
    return {
    mes:'Helooooooooo',
    items: [
      { message: 'Foo' },
      { message: 'Bar' }
      
    ]
	};


	}}
	</script>


