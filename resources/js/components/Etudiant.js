import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';

export default class Etudiant extends Component {
    constructor () {
        super()
        this.state = {
          absences: []
        }
      }

      
      componentDidMount () {
        axios.get(`/api/etud`).then(response => {
            this.setState({
                absences: response.data.data,
          })
          console.log("mm")

          var i
        for(i=0;i<this.state.absences.length;i++)
        {   
            console.log("oui")

            if(this.state.absences[i].justifie!=0){
                document.getElementById('abs'+this.state.absences[i].id).innerHTML="Justifiée"
            }
            else{
                document.getElementById('abs'+this.state.absences[i].id).innerHTML="Non justifiée"
            }
        }
        })
      }

    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        const absences  = this.state.absences

        return (
            <div className="container" >
                    <h1><center> Mes absences</center></h1>
                    <br></br>

             <table id="table" className="table">
            <thead>
            <tr>
            <th>Id</th>
            <th>modules </th>
            <th>Date </th>
            <th>Justifiée</th>
            </tr>
            </thead>
                <tbody>
                {absences.map(absence => (
                <tr key={absence.id}>
                <td> {absence.id} </td>
                <td>  {absence.module} </td>
                <td>  {absence.date} </td>
                <td id={"abs"+absence.id}></td>
                </tr>
                ))}
                </tbody>
            </table>
            </div>
);
      }
    }


    
   
//function btnClick(){ alert('yeah');}
/*
if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}*/
