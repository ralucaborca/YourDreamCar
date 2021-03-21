const router = require('express').Router();
let Car = require('../models/car.model');

router.route('/').get((req, res) => {
	Car.find()
		.then(cars => res.json(cars))
		.catch(err => res.status(400).json('Error: ' + err));
});

router.route('/add').post((req, res) => {
	
	const brand = req.body.brand;
	const model = req.body.model;

	const newCar = new Car({
		brand,
		model
	});

	newCar.save()
	.then(() => res.json('Car added!'))
	.catch(err => res.status(400).json('Error' + err));
});

module.exports = router;