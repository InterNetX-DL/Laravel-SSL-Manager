# Laravel-SSL-MANAGER
Complete integration of the InterNetX GmbH SSLManager Json API.

## Table of Contents
1. [Install](#install)
   * [Composer](#composer)
   * [Add The Provider](#add-the-provider)
2. [Configuration](#configuration)
3. [Usage](#usage)
4. [API Calls](#api-calls)
   * [Contact Create](#contact-create)
   * [Contact Update](#contact-update)
   * [Contact Delete](#contact-delete)
   * [Contact Info](#contact-info)
   * [Contact List](#contact-list)
   * [Certificate Create](#certificate-create)
   * [Certificate Reissue](#certificate-reissue)
   * [Certificate Delete](#certificate-delete)
   * [Certificate Info](#certificate-info)
   * [Certificate List](#certificate-list)
   * [Certificate Renew](#certificate-renew)
   * [Certificate Revoke](#certificate-revoke)
   * [Certificate Prepare Order](#certificate-prepare-order)
   * [Certificate Comment Update](#certificate-comment-update)
   * [Job Info](#job-info)
   * [Job List](#job-list)
   * [Job Cancel](#job-cancel)
   * [Job Confirm](#job-confirm)
   * [Job Reject](#job-reject)
   * [Job History Info](#job-history-info)
   * [Job History List](#job-history-list)
   * [Poll Info](#poll-info)
   * [Poll Confirm](#poll-confirm)
5. [Helper Methods](#helper-methods)
6. [Artisan Commands](#artisan-commands)
   * [Task Commands](#task-commands)
   * [Helper Commands](#helper-commands)
7. [Exception Handling](#exception-handling)
	* [Exceptions](#exceptions)
	* [API Errorcodes](#api-errorcodes)
8. [Changelog](#changelog)
9. [Additional Information](#additional-information)
10. [Copyright And License](#copyright-and-license)

## Install
### Composer

```shell
composer require ephenodrom/laravel-ssl-manager
```

### Add the provider
Add the following line to your app configuration at config/app.php within the "providers" array.

```php
Ephenodrom\LaravelSslManagerServiceProvider::class
```

## Configuration
In order to use the implementation, different configurations have to be made beforehand. Add the following keys to your .env file.

| Key     | Type | Description |
| SSL_MANAGER_API_URL  | url   | The url of the API backend. |
| SSL_MANAGER_API_USER | string | The API user.|
| SSL_MANAGER_API_PASSWORD | string | The password of the user. |
| SSL_MANAGER_API_CONTEXT | integer | the context of the user. |

## Usage

## API Calls

### Contact Create
#### Route
POST /sslcontact

### Contact Update
#### Route
PUT /sslcontact/$id

### Contact Delete
#### Route
DELETE /sslcontact/$id

### Contact Info
#### Route
GET /sslcontact/$id

### Contact List
#### Route
POST /sslcontact/_search

### Certificate Create
#### Route
POST /certificate

### Certificate Reissue
#### Route
PUT /certificate/$id

### Certificate Delete
#### Route
DELETE /certificate/$id

### Certificate Info
#### Route
GET /certificate/$id

### Certificate List
#### Route
POST /certificate/_search

### Certificate Renew
#### Route
PUT /certificate/$id/renew

### Certificate Revoke
#### Route
DELETE /certificate/$id/revoke

### Certificate Prepare Order
#### Route

### Certificate Comment Update
#### Route
PUT /certificate/$id/comment

### Job Info
#### Route
GET /job/$id

### Job List
#### Route
POST /job/_search

### Job Cancel
#### Route
GET /job/$id/cancel

### Job Confirm
#### Route
GET /job/$id/confirm

### Job Reject
#### Route
GET /job/$id/reject

### Job History Info
#### Route
GET /job/history/$id

### Job History List
#### Route
POST /job/history/_search

### Poll Info
#### Route
GET /poll

### Poll Confirm
#### Route
POST /poll/$id

## Helper Methods

## Artisan Commands

### Task Commands
This package includes a artisan command for each task.
#### SSLContact Tasks
* SSLContactCreate
```php
php artisan sslcontact:create 121
```
* SSLContactUpdate
```php
php artisan sslcontact:update 121
```
* SSLContactDelete
```php
php artisan sslcontact:delete 121
```
* SSLContactInfo
```php
php artisan sslcontact:info 121
```
* SSLContactList
```php
php artisan sslcontact:list
```

#### Certificate Tasks

#### Job Tasks
* JobInfo
```php
php artisan job:info 121
```
* JobList
```php
php artisan poll:list
```
* JobConfirm
```php
php artisan poll:confirm 121
```
* JobCancel
```php
php artisan poll:cancel 121
```
* JobReject
```php
php artisan poll:reject 121
```
* JobHistoryInfo
```php
php artisan job:historyinfo 121
```
* JobHistoryList
```php
php artisan job:historylist
```

#### Poll Tasks
* PollInfo
```php
php artisan poll:info
```
* PollConfirm
```php
php artisan poll:confirm 121
```

### Helper Commands

## Exception Handling

## Changelog
### Version 1.0.0 (2018-05-01)
- Initial release

## Additional Information
* This software is not developed by InterNetX GmbH !

## Copyright And License
MIT License

Copyright (c) 2018 Ephenodrom

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
