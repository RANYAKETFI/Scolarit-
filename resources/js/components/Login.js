import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';

export default class Login extends Component {
    constructor () {
        super()
        }
        //this.updateCompte = this.updateCompte.bind(this)
      

      
    componentDidMount () {
       
      }


    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        return (
            <div className="limiter">
		    <div className="container-login100">
			<div className="wrap-login100">
				<div className="login100-pic js-tilt" data-tilt>
					<img src="login/images/img-01.png" alt="IMG"></img>
				</div>

				<form method="POST" className="login100-form validate-form" action="/connexion">
					<span className="login100-form-title">
						Scolarité - Gestion des absences
					</span>

					<div className="wrap-input100 validate-input" data-validate = "Saisir l'adresse e-mail: exemple@esi.dz">
						<input className="input100" type="text" name="email" placeholder="Adresse e-mail"></input>
						<span className="focus-input100"></span>
						<span className="symbol-input100">
							<i className="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div className="wrap-input100 validate-input" data-validate = "Saisir le mot de passe">
						<input className="input100" type="password" name="password" placeholder="Mot de passe"></input>
						<span className="focus-input100"></span>
						<span className="symbol-input100">
							<i className="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div className="container-login100-form-btn">
						<button className="login100-form-btn">
							Connexion
						</button>
					</div>
                    <p id="erreur"></p>
            
					<br></br>
				<br></br>
				<br></br>
                <br></br>
				<br></br>
				<br></br>
				</form>
			</div>
		</div>
	</div>
           
        )}
    }

