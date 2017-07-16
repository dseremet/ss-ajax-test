## 1.
For this OOP approach,  there would be an abstract class so the inheritation of it would use all necessary methods, but they would be able to add their custom methods as well.

We can use interfaces when necessary. 


## 2.
If this table don't have too many create and update queries, I would add indexes to the type and city since query is being done and those fields.

**Pros** - faster getting data | 
**Cons** - slower adding and updating data

In case there are no related table, the best approach would be NoSQL database that uses key -> value structure since loading of the data would be much faster.