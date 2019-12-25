import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';
import BarreEns from './BarreEns'


export default class GroupeEns extends Component {
    constructor () {
        super()
        this.state = {
          etudiants: []
        }
        this.updateAbs = this.updateAbs.bind(this)

      }

      
      componentDidMount () {
        const  id_seance  = this.props.match.params.id_seance


        axios.get(`http://localhost:8000/api/prof/s/${id_seance}`).then(response => {

            this.setState({
                etudiants : response.data.data,
                seance : id_seance

          })


          var i
        for(i=0;i<this.state.etudiants.length;i++)
        {   
            if(this.state.etudiants[i].absence>0){
                document.getElementById('etud'+this.state.etudiants[i].id).checked=true;
            }
        }
        })

      }

      updateAbs(){
          var i
        for(i=0;i<this.state.etudiants.length;i++)
        { 
              if(document.getElementById('etud'+this.state.etudiants[i].id).checked==true){
                axios.put(`http://localhost:8000/api/prof/s/${this.state.seance}/${this.state.etudiants[i].id}/1`)
            }
            else{
                axios.put(`http://localhost:8000/api/prof/s/${this.state.seance}/${this.state.etudiants[i].id}/0`)
            }
        }
        window.history.back();
      }

      handleclick()
      {
        window.history.back()
      }

    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        const etudiants  = this.state.etudiants
        return (
          <div>

          <BarreEns/>
        <div className="content-container">
        <div className="container-fluid">
        <div className="jumbotron">
        <div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-8'>
                <div className='card'>
                  <div className='card-header'>Etudiants</div>
                  <div className='card-body'>
                    <table id="etudiants">
                        <tbody>
                      {etudiants.map(etudiant => (
                        <tr key={etudiant.id}>
                            <td>{etudiant.nom}</td> 
                            <td>{etudiant.prenom}</td> 
                            <td><input type="checkbox" id={"etud"+etudiant.id} name={etudiant.id}></input></td>
                        </tr>
                      ))}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <br></br>
            <button onClick={this.handleclick} className="button" style={{float:"right"}}>Annuler</button>
            <button onClick={this.updateAbs} className="button" id="confirmer" style={{float:"right"}}>Confirmer</button>
          </div>   
          </div>
         </div>
        </div>    
        </div> );
      }
    }



