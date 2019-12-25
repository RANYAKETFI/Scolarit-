import React from "react";
import { Route, Redirect } from "react-router-dom";
import { useAuth } from "./Auth.js";

function PrivateRoute({ component: Component, ...rest }) {
  var authent=false;

  const type=localStorage.getItem("type")
  var red="/"
          if(type=='1')
          {
             red = "/prof"
             if(window.location.pathname=="/compte")
             {
              authent=true
             }
             if(window.location.pathname.substring(1,5)=="prof")
             {
              authent=true
             }

        }
        else if(type=='2')
        {
           red = "/etud"
           if(window.location.pathname=="/compte")
           {
            authent=true
           }       
           if(window.location.pathname.substring(1,5)=="etud")
           {
            authent=true
           } 
          }



  return (
    <Route
      {...rest}
      render={props =>
        authent ? (
          <Component {...props} />
        ) : (
          <Redirect to={red} />
        )
      }
    />
  );
}

export default PrivateRoute;