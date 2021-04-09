
import React, { Component } from 'react';
import axios from 'axios';

export default class EditExercises extends Component {
     constructor(props) {
   	 super(props);

   	 this.onChangeBrand = this.onChangeBrand.bind(this);
    	this.onChangeModel = this.onChangeModel.bind(this);
    	this.onSubmit = this.onSubmit.bind(this);

   	 this.state = {
    		brand: '',
      		model: '',
      		users: []
    	}
     }
	componentDidMount() {
    axios.get('http://localhost:5000/cars/'+this.props.match.params.id)
      .then(response => {
        this.setState({
          username: response.data.brand,
          description: response.data.model
        })   
      })
      .catch(function (error) {
        console.log(error);
     })

 	  axios.get('http://localhost:5000/users/')
      .then(response => {
        if (response.data.length > 0) {
          this.setState({
            users: response.data.map(user => user.username),
          })
        }
      })
      .catch((error) => {
        console.log(error);
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
      <h3>Edit Car</h3>
	 <p>Aici vom face si partea de editare a unei masiniteeeee!!!!</p>
		<p>Si vom avea si partea aia cu tabelul chestiilor din mongoDB</p>
			<p>PWP</p>
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
