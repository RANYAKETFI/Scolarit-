import React, { useState } from "react"
import { BrowserRouter, Route, Switch } from 'react-router-dom'
/*
import Header from './Header'
import Example from './Example'*/
import Groupes from './Groupes'
import Seance from './Seance'
import GroupeEns from './GroupeEns'
import Compte from './Compte'
import Etudiant from './Etudiant'
import Login from './Login'
import { AuthContext } from "./Auth";
import PrivateRoute from './PrivateRoute';



import './App.css';

function App(props) {
  const [authTokens, setAuthTokens] = useState();
  
  const setTokens = (data) => {
    localStorage.setItem("tokens", JSON.stringify(data));
    setAuthTokens(data);
  }
  
  return (
    <AuthContext.Provider value={{ authTokens, setAuthTokens: setTokens }}>
        <BrowserRouter>
          <div>
            <Switch>
            <PrivateRoute path='/prof/s/:id_seance' component={GroupeEns} />
            <PrivateRoute path='/prof/:handle' component={Seance} />
            <PrivateRoute path='/prof' component={Groupes} />
            <PrivateRoute path='/compte' component={Compte} />
            <PrivateRoute path='/etud' component={Etudiant} />
            <Route path='/connexion' component={Login} />
            <Route path='/' component={Login} />
  
            </Switch>
          </div>
        </BrowserRouter>
        </AuthContext.Provider>

  )
}
/*
import ReactDOM from 'react-dom'
import Header from './Header'
import Example from './Example'
import Index from './Index'
import Seance from './Seance'
import GroupeEns from './GroupeEns'
import Compte from './Compte'
import Etudiant from './Etudiant'
import Login from './Login'*/



export default App;
