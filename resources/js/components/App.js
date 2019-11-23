import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import Example from './Example'
import Index from './Index'
import Seance from './Seance'
import GroupeEns from './GroupeEns'


class App extends Component {
  render () {
    return (
      <BrowserRouter>
        <div>
          <Switch>
            <Route path='/ens/s/:id_seance' component={GroupeEns} />
            <Route path='/ens/:handle/:other' component={Seance} />
            <Route path='/ens/:handle' component={Index} />
          </Switch>
        </div>
      </BrowserRouter>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))