const host_address = 'http://localhost/census_project/services/';

// Login
const login_server = `${host_address}auth/authentication.php?action=`;
const login = `${login_server}login`;

// administrator's Services
const administrator_service = `${host_address}administrator/administrator-server.php?action=`;
const add_administrator = `${administrator_service}add_administrator`;
const View_administrator = `${administrator_service}view_administrator`;
const add_household = `${administrator_service}add_household`;