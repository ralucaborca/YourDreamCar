import React, { Component } from 'react';



export default class Register extends Component {
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
	<img src="/register.jpg" alt=""/>
	<p> </p>
        <div className="header">RegisterForm</div>
	<p> </p>
        <div className="content">
         
          <div className="form">
            <div className="form-group">
              <label htmlFor="username">Username</label>
              <input type="text" name="username" placeholder="username" />
            </div>
            <div className="form-group">
              <label htmlFor="email">Email</label>
              <input type="text" name="email" placeholder="email" />
            </div>
            <div className="form-group">
              <label htmlFor="password">Password</label>
              <input type="text" name="password" placeholder="password" />
            </div>
          </div>
        </div>
        <div className="footer">
          <button type="button" className="btn">
            Register
          </button>
        </div>
	</center>
      </div>
    );
	}
}
