# speedment-com
The 2017 www.speedment.com website.

## Installation
1. Clone the repository
2. Create the database using the following script:
```sql
create database speedment_com;
use speedment_com;

create user 'speedment'@'localhost' identified by 'password';
grant all privileges on speedment_com.* to 'speedment'@'localhost';
```

3. Start a webserver on port 8081 with PHP and MySQL installed
4. Go to localhost:8081 and follow the installation guide
5. Use the following credentials when creating the root user:

| Field      | Value                |
| ---------- | -------------------- |
| Username:  | `user`               |
| Password:  | `cB&W7aws*jHiofCnSh` |

6. Complete the rest of the guide
