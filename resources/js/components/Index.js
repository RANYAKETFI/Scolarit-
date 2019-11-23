import React, { Component } from 'react';
import axios from 'axios'
import { Link } from 'react-router-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import ReactDOM from 'react-dom';

export default class Index extends Component {
    constructor () {
        super()
        this.state = {
          groupes: []
        }
      }

      
      componentDidMount () {
        const { handle } = this.props.match.params
        axios.get(`/api/prof`).then(response => {
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
          </div>        );
      }
    }


    
   
//function btnClick(){ alert('yeah');}
/*
if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}*/
