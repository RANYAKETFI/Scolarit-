import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';

export default class Login extends Component {
    constructor () {
        super()
        this.state = {login: '',
                        mdp: ''
                        };

        this.handleChange1 = this.handleChange1.bind(this);
        this.handleChange2 = this.handleChange2.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        }


        //this.updateCompte = this.updateCompte.bind(this)

    handleChange1(event) {
        this.setState({login: event.target.value});
    }
    handleChange2(event) {
        this.setState({mdp: event.target.value});
    }


    handleSubmit(event) {
        event.preventDefault();
        const login = this.state.login;
        const mdp = this.state.mdp;


        axios.post(`/api/connexion`, { login, mdp })
            .then(res => {
                if (res.data=="ok")
                {
                    window.location.href = "/connexion"
                }
                else
                {
                    document.getElementById('erreur').innerHTML = res.data

                }
             //   console.log(res);
                console.log(res.data);
            })

      //
    }





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

				<form method="POST" className="login100-form validate-form" onSubmit={this.handleSubmit}>
					<span className="login100-form-title">
						Scolarité - Gestion des absences
					</span>

					<div className="wrap-input100 validate-input" data-validate = "Saisir l'adresse e-mail: exemple@esi.dz">
						<input className="input100" type="text" name="email" placeholder="Adresse e-mail" value={this.state.login} onChange={this.handleChange1}></input>
						<span className="focus-input100"></span>
						<span className="symbol-input100">
							<i className="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div className="wrap-input100 validate-input" data-validate = "Saisir le mot de passe">
						<input className="input100" type="password" name="password" placeholder="Mot de passe" value={this.state.mdp} onChange={this.handleChange2}></input>
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
                    <br></br>
                    <p id="erreur" style={{ color: '#D8000C'}}></p>

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

