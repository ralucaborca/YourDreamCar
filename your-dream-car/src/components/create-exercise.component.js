
import React, { Component } from 'react';
import axios from 'axios';

export default class CreateExercises extends Component {
	 constructor(props) {
   	 super(props);
	 this.onChangeBrand =this.onChangeBrand.bind(this);
   	 this.onChangeModel =this.onChangeModel.bind(this);
	 this.onSubmit = this.onSubmit.bind(this);
	 this.state = {
		brand:'',
		model:'',
		users: []
		}
	}
	
  	componentDidMount() {
	  this.setState({
		users:['test user'],
		username: 'test user'
	})
	}

	onChangeBrand(e) {
          this.setState({
            brand: e.target.value
        })
        }

	onChangeModel(e) {
          this.setState({
            model: e.target.value
        })
        }

	 onSubmit(e) {
   	   e.preventDefault();
	
   	 const car={
      	   brand: this.state.brand,
     	   model: this.state.model
    	}
	
 	console.log(car);

    	axios.post('http://localhost:5000/cars/add', car)
     .then(res => console.log(res.data));
	 window.location = '/';
  }        
	render() {
    return (
     <div>
      <h3>Create New Car</h3>
      <form onSubmit={this.onSubmit}>
	<div className="form-group"> 
          <label>Username: </label>
          <select ref="userInput"
              required
              className="form-control"
              value={this.state.username}
              onChange={this.onChangeUsername}>
              {
                this.state.users.map(function(user) {
                  return <option 
                    key={user}
                    value={user}>{user}
                    </option>;
                })
              }
          </select>
        </div>
        <div className="form-group"> 
          <label>Brand: </label>
          <input  type="text"
              required
              className="form-control"
              value={this.state.brand}
              onChange={this.onChangeBrand}
              />
         </div>
        <div className="form-group"> 
          <label>Model: </label>
          <input  type="text"
              required
              className="form-control"
              value={this.state.model}
              onChange={this.onChangeModel}
              />
        </div>
     

        <div className="form-group">
          <input type="submit" value="Create Car Log" className="btn btn-primary" />
        </div>
      </form>
    </div>
    )
  }
}
