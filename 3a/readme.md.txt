MariaDB [arkademy]> select * from product
    -> ;
+----+-------------+-------+-------------+------------+
| id | name        | price | id_category | id_cashier |
+----+-------------+-------+-------------+------------+
|  1 | Latte       | 10000 |           2 |          1 |
|  2 | Cake        | 20000 |           1 |          2 |
|  3 | Nasi Goreng | 30000 |           1 |          3 |
+----+-------------+-------+-------------+------------+
3 rows in set (0.00 sec)

MariaDB [arkademy]> select * from category;
+----+-------+
| id | name  |
+----+-------+
|  1 | Food  |
|  2 | Drink |
+----+-------+
2 rows in set (0.00 sec)

MariaDB [arkademy]> select * from cashier;
+----+----------------+
| id | name           |
+----+----------------+
|  1 | Pevita Pearce  |
|  2 | Raisa Andriana |
|  3 | Sipky Jaya     |
+----+----------------+
3 rows in set (0.00 sec)

MariaDB [arkademy]> select Ch.name, P.name, Ca.name, P.price from product P inner join category Ca on P.id_category=Ca.id inner join cashier Ch on P.id_cashier=Ch.id;
+----------------+-------------+-------+-------+
| name           | name        | name  | price |
+----------------+-------------+-------+-------+
| Pevita Pearce  | Latte       | Drink | 10000 |
| Raisa Andriana | Cake        | Food  | 20000 |
| Sipky Jaya     | Nasi Goreng | Food  | 30000 |
+----------------+-------------+-------+-------+
3 rows in set (0.00 sec)

MariaDB [arkademy]>