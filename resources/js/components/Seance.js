import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';

export default class Seance extends Component {
    constructor () {
        super()
        this.state = {
          seances: []
        }
      }

      
      componentDidMount () {
        const  handle  = this.props.match.params.handle
        const  other  = this.props.match.params.other

        axios.get(`/api/ens/${handle}/${other}`).then(response => {
          console.log(handle)
          console.log(other)
          console.log(JSON.stringify(response))

            this.setState({
            seances: response.data.data
          })
        })
      }
      handleclick()
      {
        window.history.back()
      }

    render() {
        //const columns = ['id', 'groupe'];
        //alert(this.state.groupes)
        const seances  = this.state.seances
        console.log(seances)

        return (
<div className='container py-4'>
            <div className='row justify-content-center'>
              <div className='col-md-8'>
                <div className='card'>
                  <div className='card-header'>Mes Séances</div>
                  <div className='card-body'>
                    <ul className='list-group list-group-flush'>
                      {seances.map(seance => (
                        <Link
                          className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                          to={`/ens/s/${seance.id}`}
                          key={seance.id}
                        >
                          {seance.module} : {seance.date} 
                        </Link>
                      ))}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <button onClick={this.handleclick} className="button" style={{float:"right"}}>Retour</button>
          </div>        );
      }
    }


//function btnClick(){ alert('yeah');}
/*
if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}*/
