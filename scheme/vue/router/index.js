import Vue from "vue";
import VueRouter from "vue-router";
import NotFound from "../views/NotFound.vue";
import Home from "../views/site/Home.vue";
import Accomodations from "../views/site/Accomodations.vue";
import Clubs from "../views/site/Clubs.vue";
import Coffee from "../views/site/Coffee.vue";
import Restaurent from "../views/site/Restaurent.vue";
import Car from "../views/site/Car.vue";
import viewHotel from '../views/site/viewHotel.vue';
import BookCar from "../views/site/bookCar.vue";
import BookFlight from "../views/site/BookFlight.vue";
import viewClub from '../views/site/viewClub.vue'
import viewCoffee from '../views/site/viewCoffee.vue'
import viewRestaurant from '../views/site/viewRestaurant.vue'
import Signin from '../views/site/Signin.vue'
import Signup from '../views/site/Signup.vue'
import Account from '../views/site/Account.vue'
import Contact from '../views/site/contact.vue'

// admin
import Dashboard from '../views/admin/Dashboard.vue'
import adminClubs from '../views/admin/clubs.vue'
import adminCoffee from '../views/admin/coffee.vue'
import adminRestaurants from '../views/admin/restaurants.vue'
import adminAccomodations from '../views/admin/accomodations.vue'
import adminRooms from '../views/admin/Rooms.vue'
import adminCars from '../views/admin/car.vue'
import adminClubProducts from '../views/admin/ClubProducts.vue'
import adminCoffeeProducts from '../views/admin/CoffeeProducts.vue'
import adminRestaurantProducts from '../views/admin/RestaurantProducts.vue'
import adminhotelProducts from '../views/admin/hotelProducts.vue'

Vue.use(VueRouter);
const routes = [
	{
		path: "/",
		name: "Home",
		component: Home,
	},
	{
		path: "/accomodations",
		name: "Accomodations",
		component: Accomodations,
	},
	{
		path: "/viewHotel/:id",
		name: "viewHotel",
		component: viewHotel,
	},
	{
		path: "/clubs",
		name: "Clubs",
		component: Clubs,
	},
	{
		path: "/coffee",
		name: "Coffee",
		component: Coffee,
	},
	{
		path: "/restaurent",
		name: "Restaurent",
		component: Restaurent,
	},
	{
		path: "/car",
		name: "Car",
		component: Car,
	},
	{
		path: "/bookCar/:id",
		name: "BookCar",
		component: BookCar,
	},
	{
		path: "/bookFlight",
		name: "BookFlight",
		component: BookFlight,
	},
	{
		path: "*",
		component: NotFound,
		name: "notfound",
		path: "/viewClub/:id",
		name: "viewClub",
		component: viewClub,
	},
	{
		path: "/viewCoffee/:id",
		name: "viewCoffee",
		component: viewCoffee,
	},
	{
		path: "/viewRestaurant/:id",
		name: "viewRestaurant",
		component: viewRestaurant,
	},
	{
		path: "/signin",
		name: "Signin",
		component: Signin,
	},
	{
		path: "/signup",
		name: "Signup",
		component: Signup,
	},
	{
		path: "/account",
		name: "Account",
		component: Account,
	},
	{
		path: "/contact",
		name: "Contact",
		component: Contact,
	},
	
	// admin

	{
		path: "/admin",
		name: "Dashboard",
		component: Dashboard,
	},
	{
		path: "/admin/clubs",
		name: "adminClubs",
		component: adminClubs,
	},
	{
		path: "/admin/coffee",
		name: "adminCoffee",
		component: adminCoffee,
	},
	{
		path: "/admin/coffee/products/:id",
		name: "adminCoffeeProducts",
		component: adminCoffeeProducts,
	},
	{
		path: "/admin/restaurants",
		name: "adminRestaurants",
		component: adminRestaurants,
	},
	{
		path: "/admin/restaurant/products/:id",
		name: "adminRestaurantProducts",
		component: adminRestaurantProducts,
	},
	{
		path: "/admin/accomodations",
		name: "adminAccomodations",
		component: adminAccomodations,
	},
	{
		path: "/admin/hotel/products/:id",
		name: "adminhotelProducts",
		component: adminhotelProducts,
	},
	{
		path: "/admin/rooms/:id",
		name: "adminRooms",
		component: adminRooms,
	},
	{
		path: "/admin/car",
		name: "adminCars",
		component: adminCars,
	},
	{
		path: "/admin/clubs/products/:id",
		name: "adminClubProducts",
		component: adminClubProducts,
	},



	// not found
	
	{
		path: "*",
		component: NotFound,
		name: "notfound",
	},
];

const router = new VueRouter({
	mode: "history",
	base: process.env.BASE_URL,
	routes,
	duplicateNavigationPolicy: "ignore",
	linkActiveClass: "active",
	scrollBehavior: () => ({
		x: 0,
		y: 0,
	}),
});

export default router;
