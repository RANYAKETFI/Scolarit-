import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import BarreEns from './BarreEns'


export default class Groupes extends Component {
    constructor () {
        super()
        this.state = {
          groupes: []
        }
      }

      
      componentDidMount () {
        const id= localStorage.getItem('id')
        axios.post(`http://localhost:8000/api/prof`,{id}).then(response => {
            this.setState({
            groupes: response.data.data,
          })
        })
      }

    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        const groupes  = this.state.groupes
        console.log(groupes)

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
                  <div className='card-header'>Mes groupes</div>
                  <div className='card-body'>
                    <ul className='list-group list-group-flush'>
                      {groupes.map(groupe => (
                        <Link
                          className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                          to={`/prof/${groupe.id}`}
                          key={groupe.id}
                        >
                          {groupe.groupe}
                        </Link>
                      ))}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>
         </div>
          </div>
         </div>
         );
      }
    }


    
   