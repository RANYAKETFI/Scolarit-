import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import Example from './Example'
import Index from './Index'
import Seance from './Seance'
import GroupeEns from './GroupeEns'
import Compte from './Compte'
import Etudiant from './Etudiant'
import Login from './Login'



class App extends Component {
  render () {
    return (
      <BrowserRouter>
        <div>
          <Switch>
          <Route path='/prof/s/:id_seance' component={GroupeEns} />
          <Route path='/prof/:handle' component={Seance} />
          <Route path='/prof' component={Index} />
          <Route path='/compte' component={Compte} />
          <Route path='/etud' component={Etudiant} />
          <Route path='/connexion' component={Login} />


          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))