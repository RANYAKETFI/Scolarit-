import React, { Component } from 'react';
import ReactDOM from 'react-dom';
/*
export default class Index extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Componentss</div>
                            <button onClick={this.click}> test </button>
                            <div className="card-body">I'm an example component!</div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
    click(){alert("ghh");}

}

//function btnClick(){ alert('yeah');}

if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}*/

export default class Index extends Component {
    render() {
        const items = []

          return (<div className="container">
          <div className="row justify-content-center">
              <div className="col-md-8">
                  <div className="card">
                      <div className="card-header">stp {groupes.groupe}</div>
                      <button onClick={this.click}> test </button>
                  </div>
              </div>
          </div>
      </div>
          );
    }
    click(){alert("yup");}

}

//function btnClick(){ alert('yeah');}

if (document.getElementById('example')) {
    ReactDOM.render(<Index />, document.getElementById('example'));
}
