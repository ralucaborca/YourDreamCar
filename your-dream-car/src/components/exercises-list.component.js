
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
			<img src="/caruri.jpg" alt=""/>
		  <p>Home page! ieeei</p>
		  </div>
		)
	}
}
