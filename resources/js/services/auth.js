export default class Auth {
    isLoggedIn() {
        if (localStorage.getItem('token')) {
            return true;
        }
        return false;
    }
}
