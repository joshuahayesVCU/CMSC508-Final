<h2>Functional Dependencies</h2>

Climber (<ins>CLIMBER_ID</ins>, climber_Name, climber_Location)
  - CLIMBER_ID -> climber_Name, climber_Location
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies.
    
Fitness (<ins>CLIMBER_ID</ins>, climber_Height, climber_Weight, climber_hangWeight, climber_hangTime, climber_pullUpLoad, climber_pullUps, climber_projectedAbillity())
  - CLIMBER_ID -> climber_Height, climber_Weight, climber_hangWeight, climber_hangTime, climber_pullUpLoad, climiber_pullUps, climber_projectedAbillity)
  - Normalizations
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies.
    
Crag (<ins>CRAG_ID</ins>, crag_Location, total_Climbs)
  - CRAG_ID -> crag_Location, total_Climbs
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies.
    
Climbs(<ins>CRAG_ID</ins>, <ins>route_Name</ins>, route_Rating, route_Type, route_Height)
  - CRAG_ID, route_Name -> route_Rating, route_Type, route_Height
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies
    
Gear(<ins>GEAR_ID</ins>, gear_Name, gear_Type)
  - GEAR_ID -> gear_Name, gear_Type
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies
    
Owned Gear(<ins>CLIMBER_ID</ins>, <ins>GEAR_ID</ins>, quantity)
  - CLIMBER_ID, GEAR_ID -> quantity
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies
    
Store(<ins>STORE_ID</ins>, <ins>GEAR_ID</ins>, store_Name, store_Location)
  - STORE_ID, GEAR_ID -> store_Name, store_Location
  - Normalization:
    - Already in BCNF, it is in 3NF and the left-hand side is a superkey of the relation.
    - Already in 4NF, it is in BCNF and there are no multivalued dependencies
