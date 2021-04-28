/*
 global
 window
 document
*/

const MAX_PARTICLES = 30;
let ANGLE = 0;

/**
 * Generates a random number between a range of numbers
 *
 * @param  {number} min  minimum value
 * @param  {number} max  maximum value
 *
 * @return {number} A random number
 */
function range(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

/**
 * Generates an array of particles in near random coordinates and sizes
 *
 * @param  {number} width   the maximum width of the canvas
 * @param  {number} height  the maximum height of the canvas
 *
 * @return {Array<Object>} An array of particle objects
 */
function generateParticles(width, height) {
	const particles = [];
	for (let i = 0; i <= MAX_PARTICLES; i++) {
		particles.push({
			id: i,
			// x-coordinate
			x: range(0, width),
			// y-coordinate
			y: range(0, height),
			// particle radius
			r: range(1, 8),
			// density
			d: range(0, MAX_PARTICLES), // density
		});
	}
	return particles;
}

/**
 * draws the particles to the canvas
 *
 * @param  {Object} context    canvas context
 * @param  {Array} particles   array of particles
 * @param  {number} width      width of the canvas
 * @param  {number} height     height of the canvas
 *
 * @return {undefined}
 */
function draw(context, particles, width, height) {
	context.clearRect(0, 0, width, height);
	context.fillStyle = 'rgba(50, 50, 50, 0.6)';
	context.beginPath();
	particles.forEach(particle => {
		context.moveTo(particle.x, particle.y);
		context.fillRect(particle.x, particle.y, particle.r, particle.r);
	});
	context.fill();
	update(particles, width, height);
}

/**
 * Updates each particle to change their x,y coordinates
 *
 * @param  {Array} particles  array of particles
 * @param  {number} width     width of canvas
 * @param  {number} height    height of canvas
 *
 * @return {undefined}
 */
function update(particles, width, height) {
	particles.forEach((particle, indx) => {
		ANGLE += 0.0001;

		particle.y += -1 * (Math.cos(ANGLE + particle.d) + 2 + particle.r / 2);
		particle.x += Math.sin(ANGLE) * 3;

		// "regenerate" the particle, basically resets the particle x,y coordinates
		if (particle.y <= -10) {
			particle.x = range(0, width);
			particle.y = height;
		}

		// wrapping from left to right
		if (particle.x < -10) {
			particle.x = width;
		}

		// wrapping from right to left
		if (particle.x > width + 10) {
			particle.x = 0;
		}
	});
}

window.onload = function _onload() {
	// canvas initialization
	const canvas = document.getElementById('canvas');
	const context = canvas.getContext('2d');

	// canvas dimensions
	const WIDTH = window.innerWidth;
	const HEIGHT = window.innerHeight;

	canvas.width = WIDTH;
	canvas.height = HEIGHT;

	const particles = generateParticles(WIDTH, HEIGHT);

	// animation
	setInterval(() => {
		draw(context, particles, WIDTH, HEIGHT);
	}, 30);
};
