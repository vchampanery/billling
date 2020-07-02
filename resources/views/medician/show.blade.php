@extends('admin_template')
@section('css')
<style>
    .redd{
        background-color: red;
    }
    .bluee{
        background-color: blue;
    }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Medician Management</h2>
            </div>
            <div id="app" >
               
                <my-cmp></my-cmp>
                <my-cmp></my-cmp>
                <my-cmp1></my-cmp1>
               <example-component></example-component>
                <!-- <my-cmp-temp></my-cmp-temp> -->
            </div>
            <div id="app1" >
                @{{title}} <br>
                <button @click='onChange'> change in vue2 (app1)</button>
                <my-cmp></my-cmp>
            </div>
            
            <div id="app2" >
                <h3>@{{title}}</h3>
                <button @click="title = 'changes'">Update Title (tital)</button> 
                <button @click="destroy">Destroy</button> 
            </div>
                
<!--                <div style='visibility:hidden'>
                    <input type="text" v-model="title" >
                    <a v-bind:href="title">@{{title}}</a>
                    <button v-on:click="incress" :class="color">Click me</button>
                    <input type="text" v-model="color">
                    @{{incOpr}} <br>
                    @{{result()}} <br>
                    @{{resultChange}} <br>
                    <p v-on:mousemove="changecoordinate">Co ordinate @{{x}} / @{{y}}
                        - <span v-on:mousemove="dummyStop">Dead stop</span></p>
                    <hr><hr>
                    <input type="text" v-model="colorName">
                    <input type="text" v-model="fsize">
                    @{{testWatch}}
                    <div :style='ass'>sdfasdfsda</div>
                
                <template  v-show='atchdCls'>
                    <p v-show='atchdCls'>You can see me</p>
                </template>
                    
                <p @mousemove='atchdCls = !atchdCls'>You can Also see me!!!</p>
                <button @click="prson.push('name')"> add</button>
                <ul>
                    <li v-for='(prs,i) in prson'>
                    @{{prs.name}} (@{{i}})
                    </li>
                </ul>
                <span v-for="testn in 10">@{{ testn }}</span>
                </div>
                
                   
                        <h2>you</h2>
                   
                        <h2>monster</h2>-->
                   
                
            </div>
        </div>
    </div>


  
@endsection

@section('js')

<script src="{{ asset('js/components/ExampleComponent.vue') }}"></script>

<script >
    
//   new Vue({
//		el:'#app',
//		data:{
//			title:'hello world',
//			link: 'https://www.google.com',
//			linkalink:'<a href="https://www.google.com">Google</a>',
//                        incOpr:0,
//                        testWatch:0,
//                        x:0,
//                        y:0,
//                        atchdCls:true,
//                        color:'redd',
//                        fsize : 30,
//                        colorName:'red',
//                        prson:[
//                            {name:'max',age:10,color:'red'},
//                            {name:'Anna',age:12,color:'blue'}
//                        ]
//		},
//                computed:{
//                    ass: function(){
//                        return {
//                           backgroundColor: this.colorName,
//                           fontSize:  this.fsize + 'px'
//                        }
//                    },
//                    resultChange(){
//                        
//                       return this.incOpr;
//                    },
//                    showCls: function(){
//                        return{
//                            redd: this.atchdCls,
//                            bluee: !this.atchdCls
//                        }
//                    },
//                },
//                watch:{
//                    incOpr:function(value){
//                        console.dir("watch incOpr"+value);
//                    },
//                    testWatch: function(){
//                        console.dir("watch testWatch : "+this.fsize);
//                      return this.fsize
//                  }  
//                },
//		methods:{
//			changeTitle:function(event){
//				this.title = event.target.value
//			},
//			changeTitleNew:function(event){
//				return this.title;
//			},
//                        incress:function(){
//                            return this.incOpr++;
//                        },
//                        result:function(){
//                            return this.x+this.incOpr;
//                        },
//                        changecoordinate:function(event){
//                            this.x = event.clientX;
//                            this.y = event.clientY;
//                        },
//                        dummyStop:function(event){
//                            event.stopPropagation();
//                        }
//		}
//	});
   </script>
@endsection