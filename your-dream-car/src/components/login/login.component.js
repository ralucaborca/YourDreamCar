import React, { Component } from 'react';



export default class LogIn extends Component {
	constructor (props){
	  super(props);
	 this.onSubmit = this.onSubmit.bind(this);
	}
	
	 onSubmit(e) {
   	   e.preventDefault();}

	render(){
	  return (
     	 <div className="base-container" ref={this.props.containerRef}>
		<center>
		<img src="/loginp.jpg" alt=""/>
		</center>
		<center>
       		 <div className="header">LoginForm</div>
		<p> </p>
       		 <div className="content">
        
         	 <div className="form">
           	 <div className="form-group">
              <label htmlFor="username">Username </label>
              <input type="text" name="username" placeholder="username" />
        	 </div>
          	  <div className="form-group">
              <label htmlFor="password">Password </label>
              <input type="password" name="password" placeholder="password" />
            </div>
          </div>
        </div>
        <div className="footer">
          <button type="button" className="btn">
            Login
          </button>
	
        </div>
	</center>
      </div>
    );

}
}

