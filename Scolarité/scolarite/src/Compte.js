import React, { Component } from 'react';
import axios from 'axios'
import { BrowserRouter, Route, Switch, Redirect } from 'react-router-dom'
import ReactDOM from 'react-dom';
import BarreEns from './BarreEns';
import BarreEtud from './BarreEtud';


export default class Compte extends Component {
    constructor () {
        super()
        this.state = {
          compte: {}
        }
        //this.updateCompte = this.updateCompte.bind(this)
      }

      
    componentDidMount () {
     
          document.getElementById('login').value=localStorage.getItem('login')
          document.getElementById('nom').value=localStorage.getItem('nom')
          document.getElementById('prenom').value=localStorage.getItem('prenom')

      }

    

      /*updateCompte(){
        window.history.back();
      }

      handleclick()
      {
        window.history.back()
      }*/

    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        var etud=false
        if(localStorage.getItem("type")=="2"){ etud=true}
        return ( <div>
            {
               etud ? (
                  <BarreEtud/>
                ) : (
                  <BarreEns/>
                )
              }
            <div className="content-container">
            <div className="container-fluid">
            <div className="jumbotron">
            <div class="container" >
            <div class="form-style-10">
            <form method="POST" action="/compte">
                <div class="section"><span>1</span>Identifiants</div>
                <div class="inner-wrap">
                    <label>Adresse e-mail: <input id="login" type="email" name="email"/></label>
                    <label>Nouveau mot de passe: <input type="password" name="mdp" /></label>
                </div>
            
                <div class="section"><span>2</span>Informations personnelles</div>
                <div class="inner-wrap">
                
                    <label>Nom: <input id="nom" type="text" name="nom"/></label>
                    <label>Prénom: <input id='prenom' type="text" name="prenom" /></label>
                </div>
            
                <div class="button-section">
                <input type="submit" value="Modifier"/>
                </div>
                
                
            </form>
            </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
        )}
    }


//function btnClick(){ alert('yeah');}
/*
if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}*/
