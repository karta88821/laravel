
# Laravel Demo

### Run Project
```
php artisan server
```

## End points
|End points   |HTTP Method|Description|JSON Body|
|----------------|------------|-----------------------------|--------|
|/api/posts|POST|Create a new post   |`title`: string, `content`: string|
|/api/posts|GET|Get all posts   |None|
|/api/posts/post_id|GET|Get a single post with post id   |None|
|/api/posts/post_id/comments|POST|Create a new comment to a post |`messages`: string|
|/api/posts/post_id/comments|GET|Get all comments for a post|None|


## Tables of the MySQL Database 

### MySQL Database
The MySQL database hosts on the **AWS EC2**.

### Posts
|Name|Data Type|
|--|------------|
|id|bigint|
|title|varchar(255)|
|content|varchar(255)|
|created_at|timestamp|
|updated_at|timestamp|

### Comments
|Name|Data Type|
|--|------------|
|id|bigint|
|post_id|bigint|
|messages|varchar(255)|
|created_at|timestamp|
|updated_at|timestamp|

> `post_id` is a foreign key which is associted with the `id` in the Posts table



