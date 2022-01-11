let api_base_url = "";
if (process.env.NODE_ENV === "production") {
  api_base_url = "https://www.checkin.rw/api/v1";
} else {
  api_base_url = "http://127.0.0.1:8000/api/v1";
}
export const API_BASE_URL = api_base_url;

let base_url = "";
if (process.env.NODE_ENV === "production") {
  base_url = "https://www.checkin.rw/api/v1";
} else {
  base_url = "http://127.0.0.1:8080/api/v1";
}
let upload_base_url = "";
if (process.env.NODE_ENV === "production") {
  upload_base_url = "https://www.checkin.rw/";
} else {
  upload_base_url = "http://127.0.0.1:8000/";
}

export const UPLOAD_BASE_URL = upload_base_url;

export const BASE_URL = base_url;

/* ---------------------------------------------------------------
 * API LIST
 ----------------------------------------------------------------*/
// Auth api

// Upload api
export const UPLOAD_GET_ALL_FILES_URL = "upload/all-files";
export const UPLOAD_DELETE_FILE_URL = "upload/delete";
export const UPLOAD_SEARCH_FILE_URL = "upload/search";
export const UPLOAD_SEARCH_FILE_BY_TYPE_URL = "upload/search-by-type";
export const UPLOAD_UPDATE_FILE_URL = "upload/update-file";

// Notification api
export const NOTIFICATION_GET_ALL_URL = "/notification/mine";
export const NOTIFICATION_MAKE_IT_SEEN_URL = "/notification/make/seen";

// Other api
export const SEARCH_BASED_CATEGORY_URL = "/search/based/category";
export const SEARCH_BASED_QUERY_URL = "/search/based/query";
export const SAVE_SEARCH_TEXT_URL = "/search/save/text";
export const GET_SEARCH_TEXT_URL = "/search/get/text";
export const SEARCH_GET_HISTORY_URL = "/search/mine/history";
export const SEARCH_REMOVE_FROM_HISTORY_URL = "/search/remove/history";
export const SEND_CONTACT_MESSAGE_URL = "/send/contact/message";

// clubs
export const GET_CLUBS_URL = api_base_url + "/admin/getClubs";
export const ADD_CLUBS_URL = api_base_url + "/admin/addClubs";
export const UPDATE_CLUBS_URL = api_base_url + "/admin/updateClubs";
export const DELETE_CLUBS_URL = api_base_url + "/admin/deleteClub/";
export const GET_TOP_CLUBS_URL = api_base_url + "/admin/getTopClubs";
export const GET_SINGLE_CLUB_URL = api_base_url + "/admin/getSingleClub/";
// coffees
export const GET_COFFEE_URL = api_base_url + "/admin/getCoffees";
export const ADD_COFFEE_URL = api_base_url + "/admin/addCoffees";
export const UPDATE_COFFEE_URL = api_base_url + "/admin/updateCoffees";
export const DELETE_COFFEE_URL = api_base_url + "/admin/deleteCoffee/";
// restaurant
export const GET_RESTAURANTS_URL = api_base_url + "/admin/getRestaurants";
export const ADD_RESTAURANTS_URL = api_base_url + "/admin/addRestaurants";
export const UPDATE_RESTAURANTS_URL = api_base_url + "/admin/updateRestaurants";
export const DELETE_RESTAURANTS_URL = api_base_url + "/admin/deleteRestaurant/";
// Accomodations
export const GET_ACCOMODATION_URL = api_base_url + "/admin/getAccomodations";
export const ADD_ACCOMODATION_URL = api_base_url + "/admin/addAccomodations";
export const UPDATE_ACCOMODATION_URL = api_base_url + "/admin/updateAccomodations";
export const DELETE_ACCOMODATION_URL = api_base_url + "/admin/deleteAccomodation/";
export const GET_TOP_ACCOMODATION_URL = api_base_url + "/admin/getTopAccomodations";
export const GET_ACCOMODATION_GROUPED_URL = api_base_url + "/admin/getGroupedAccomodations";
export const GET_SINGLE_ACCOMODATION_URL = api_base_url + "/admin/getSingleAccomodations/";
// Rooms
export const GET_ROOMS_URL = api_base_url + "/admin/getRooms/";
export const ADD_ROOMS_URL = api_base_url + "/admin/addRooms";
export const UPDATE_ROOMS_URL = api_base_url + "/admin/updateRooms";
export const DELETE_ROOMS_URL = api_base_url + "/admin/deleteRoom/";

// update accomodation add-ons
export const UPDATE_GYM_URL = api_base_url + "/admin/updateGym";
export const UPDATE_POOL_URL = api_base_url + "/admin/updatePool";
export const UPDATE_HALL_URL = api_base_url + "/admin/updateHall";
export const UPDATE_RESTAURANT_URL = api_base_url + "/admin/updateRestaurant";

// cars
export const GET_CARS_URL = api_base_url + "/admin/cars/getCars";
export const ADD_CARS_URL = api_base_url + "/admin/cars/addItem";
export const UPDATE_CARS_URL = api_base_url + "/admin/cars/updateItem";
export const DELETE_CARS_URL = api_base_url + "/admin/cars/deleteItem/";


// Clubs products
export const GET_CLUB_PRODUCTS_URL = api_base_url + "/admin/getClubProducts/";
export const ADD_CLUB_PRODUCTS_URL = api_base_url + "/admin/addClubProducts";
export const UPDATE_CLUB_PRODUCTS_URL = api_base_url + "/admin/updateClubProducts";
export const DELETE_CLUB_PRODUCTS_URL = api_base_url + "/admin/deleteClubProduct/";

// coffee products
export const GET_COFFEE_PRODUCTS_URL = api_base_url + "/admin/getCoffeeProducts/";
export const ADD_COFFEE_PRODUCTS_URL = api_base_url + "/admin/addCoffeeProducts";
export const UPDATE_COFFEE_PRODUCTS_URL = api_base_url + "/admin/updateCoffeeProducts";
export const DELETE_COFFEE_PRODUCTS_URL = api_base_url + "/admin/deleteCoffeeProduct/";

// Restaurant products
export const GET_RESTAURANT_PRODUCTS_URL = api_base_url + "/admin/getRestaurantProducts/";
export const ADD_RESTAURANT_PRODUCTS_URL = api_base_url + "/admin/addRestaurantProducts";
export const UPDATE_RESTAURANT_PRODUCTS_URL = api_base_url + "/admin/updateRestaurantProducts";
export const DELETE_RESTAURANT_PRODUCTS_URL = api_base_url + "/admin/deleteRestaurantProduct/";

// hotel products
export const GET_HOTEL_PRODUCTS_URL = api_base_url + "/admin/getHotelProducts/";
export const GET_GROUPEDHOTEL_PRODUCTS_URL = api_base_url + "/admin/getGroupedHotelProducts/";
export const ADD_HOTEL_PRODUCTS_URL = api_base_url + "/admin/addHotelProducts";
export const UPDATE_HOTEL_PRODUCTS_URL = api_base_url + "/admin/updateHotelProducts";
export const DELETE_HOTEL_PRODUCTS_URL = api_base_url + "/admin/deleteHotelProduct/";

// clients
export const CLIENT_LOGIN_URL = api_base_url + "/clientLogin";
export const GET_CLIENTS_URL = api_base_url + "/getClients";
export const ADD_CLIENT_URL = api_base_url + "/addClient";
export const UPDATE_CLIENT_URL = api_base_url + "/updateClient";
export const DELETE_CLIENT_URL = api_base_url + "/deleteClient/";

// others

export const CONTACT_NOW_URL = api_base_url + "/contactNow/";

