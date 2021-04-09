
import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import axios from 'axios';

const Car = props => (
  <tr>
    <td>{props.car.brand}</td>
    <td>{props.car.model}</td>
    <td>
      <Link to={"/edit/"+props.car._id}>edit</Link> | <a href="#" onClick={() => { props.deleteCar(props.car._id) }}>delete</a>
    </td>
  </tr>
)

export default class ExerciseList extends Component {
	constructor (props){
	  super(props);
	 this.deleteCar = this.deleteCar.bind(this);
	this.state={cars:[]};

	}
	componentDidMount() {
        axios.get('http://localhost:5000/cars/')
      .then(response => {
        this.setState({ cars: response.data })
      })
      .catch((error) => {
        console.log(error);
      })
  }

	deleteCar(id) {
    	axios.delete('http://localhost:5000/cars/'+id)
      .then(response => { console.log(response.data)});

    	this.setState({
      cars: this.state.cars.filter(el => el._id !== id)
    })
  }

	exerciseList() {
    	return this.state.cars.map(currentexercise => {
      	return <Car car={currentexercise} deleteCar={this.deleteCar} key={currentexercise._id}/>;
    })
  }

	render(){
		return(
		  <div>
			<center>
			<p>HELLO, HELLO!!!</p>
			<img src="/caruri.jpg" alt=""/>
			</center>
		  <p> If you are thinking about buying a car but you have a lot to choose from and you cannot decide which is the most suited for you, then you came into the right place.</p>
		<p>By asking a few questions about yourself and the way you usually use an automobile, we will be able to recommend you the car that will match perfectly with you and your need aka “Your Dream Car”.</p>
		<p>You can contact us, for more information here:</p>
		<p>Email: yourdreamcar@gmail.com</p>
		<p>Phone: 05672871901</p>
		  </div>
		)
	}
}
