# Valenture Canvas API

PHP Api for communicating with the Canvas LMS

# Requirements
- PHP7.2
- Canvas LMS Access Token
- Guzzle (or any alternative PSR7-compatible client)

# Basic Usage
    // authenticate with canvas
    $token = '12345~q1YFnWehE0Ud4rQQP7nk2q1VhEIJz8lmW5TDSdw4vgkJZbvmEEAOkbvmyUevKY4L';
    $config = new CanvasConfig($token);

    // build client + api
    $client = new Client();
    $api = new CanvasApi($config, $client);
    
# Performing Calls

## Users

### ListUsers
    $api->getUsersModule()->listUsers();

### CreateUser
    $api->getUsersModule()->createUser(CreateUserRequest $createUserRequest)