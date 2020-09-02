<template>
<ul>
<li v-for="n in evenNumbers">{{ n }}</li>
</ul>


  </template>
  <script>
  export default {
  data: function klp() {
    return {
  number: [ 1, 2, 3, 4, 5 ]
};},
computed: {
  evenNumbers: function () {
    return this.number.filter(function (num) {
      return !(num % 2 === 0) })
  }
}

  }
  </script>