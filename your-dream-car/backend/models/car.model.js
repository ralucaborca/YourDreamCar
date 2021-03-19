const mongoose = require('mongoose');

const Schema = mongoose.Schema;

const carSchema = new Schema({
	username: { type: String, required: true },
	brand: { type: String, required: true },
	model: { type: String, required: true },
}, {
	timestamps: true,
});

const Car = mongoose.model('Car', carSchema);

module.exports = Car;