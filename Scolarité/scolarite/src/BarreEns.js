import React from 'react'
import { Link } from 'react-router-dom'
import{ Component } from 'react';
import axios from 'axios'

export default class BarreEns extends Component {
    constructor () {
        super()
        this.state = {
          etudiants: []
        }
      }

      
      componentDidMount () {
        /*const  handle  = this.props.match.params.handle

        axios.get(`/api/etud/${handle}`).then(response => {

            this.setState({
            //seances: response.data.data
          })
        })*/

      }


    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)


        return (
      
    <div className="sidebar-container">
  <div className="sidebar-logo">

    ESI-Scolarité
  </div>
  <ul className="sidebar-navigation">
  

  <li className="header"><strong><center> {localStorage.getItem("nom")}  {localStorage.getItem("prenom")} </center></strong><center>{localStorage.getItem("login")}</center>   
  <center><strong>enseignant</strong></center>
  </li>
    <li className="header">Fonctionnalités</li>
   

    <li>
      <a href="/prof">
        <i className="fa fa-users" aria-hidden="true"></i> Gérer les absences
      </a>
    </li>

    <li>
      <a href="/compte">
        <i className="fa fa-tachometer" aria-hidden="true"></i> Gérer mon compte
      </a>
    </li>
    <li className="header"></li>
    
   
    <li>
      <a href="/deconnexion">
        <i className="fa fa-info-circle" aria-hidden="true"></i> Déconnexion
      </a>
    </li>
  </ul>
</div>
)
}
}