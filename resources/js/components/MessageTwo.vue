<template>
<div>
<p v-if="lp">How are you??????????</p>
<p v-else>I am fine</p>
<p>{{ po }}</p>
<p>{{ kp }}</p>
<p>{{ info }}</p>
<MessageFour></MessageFour>

</div>
</template>
<script>
import MessageFour from './MessageFour';
export default{
data() {
return {

 lp:false,
 po:'kamal',
 info: null,
 kp:'Now I am doing well....'
    };},
    


  components:{ MessageFour}



}

</script>