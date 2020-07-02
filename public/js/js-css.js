
// import Vue from 'vue';
// import Home from 'home.vue';

// Vue.component('my-cmp-temp',Home);

Vue.component('my-cmp',{
    data: function() {
        return {
            status: "App template"
        }
        
    },
    template: '<p>statue critical at : {{status}}</p>' 
 });

var cmp = {
    data: function() {
        return {
            status: "App template1"
        }
        
    },
    template: '<p>statue critical at variable: {{status}}</p>' 
}
var vm = new Vue({
   el:'#app',
    data:{
        title:"first instance app 1",
        status: "App template"
    },
    methods:{
        attack:function(){
            alert("attach clicked")
        },
        special_attack:function(){
            alert("special_attack clicked")
        },
        heal:function(){
            alert("heal clicked")
        },
        give_up:function(){
            alert("give_up clicked")
        }
    },
    watch:{
        title: function(val){
            alert("tital properti changed to : "+ val);
        }
    },
    components:{
        'my-cmp1': cmp
    }
    // template: '<p>statue critical at {{status}}</p>'
});

var vm1 = new Vue({
    el:'#app1',
    data:{
        title:"second instance app 2"
    },
    methods:{
        onChange:function(){
          vm.title="first instance app 1.1";
        },
        special_attack:function(){
            alert("special_attack clicked")
        },
        heal:function(){
            alert("heal clicked")
        },
        give_up:function(){
            alert("give_up clicked")
        }
    }
});
var vm2 = new Vue({
   data:{
       title : "The Title v2"
   },
   beforeCreate: function(){
       console.dir("beforeCreate()");
   },
   created: function(){
    console.dir("created()");
   },
   beforeMount:function(){
    console.dir("beforeMount()");
   },
   mounted:function(){
    console.dir("mounted()");
   },
   beforeUpdate:function(){
    console.dir("beforeUpdate()");
   },
   updated:function(){
    console.dir("updated()");
   },
   beforeDestroy:function(){
    console.dir("beforeDestroy()");
   },
   destroyed:function(){
    console.dir("destroyed()");
   },
   methods:{
       destroy:function(){
           this.$destroy();
       }
   }
    
});

vm2.$mount('#app2');
// vm.$mount('#app');

