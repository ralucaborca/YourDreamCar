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

router.route('/:id').get((req, res) => {
  	Car.findById(req.params.id)
    		.then(cars => res.json(cars))
    		.catch(err => res.status(400).json('Error: ' + err));
});

router.route('/:id').delete((req, res) => {
 	 Car.findByIdAndDelete(req.params.id)
    		.then(() => res.json('Car deleted.'))
    		.catch(err => res.status(400).json('Error: ' + err));
});


router.route('/update/:id').post((req, res) => {
  	Car.findById(req.params.id)
    		.then(cars => {
     		cars.brand = req.body.brand;
      		cars.model = req.body.model;

      		cars.save()
       			.then(() => res.json('Car updated!'))
        		.catch(err => res.status(400).json('Error: ' + err));
    })
    	.catch(err => res.status(400).json('Error: ' + err));
});

module.exports = router;
