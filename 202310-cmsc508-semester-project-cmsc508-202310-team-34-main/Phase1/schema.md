<h1>Relational Schema</h1>

Climber (<ins>CLIMBER_ID</ins>, climber_Name, climber_Location)
  - Primary Key
    - CLIMBER_ID
  - Attributes
    - climber_Name
    - climber_Location
  - Domain
    - climberID: Positive integer
    - climber_Name: string
    - climber_Location: string



Fitness (<ins>CLIMBER_ID</ins>, climber_Height, climber_Weight, climber_hangWeight, climber_hangTime, climber_pullUpLoad, climber_pullUps, climber_projectedAbillity())
  - Primary Key
    - CLIMBER_ID
  - Foreign Key
    - CLIMBER_ID
  - Attributes
    - climber_Height
    - climber_Weight
    - climber_hangWeight
    - climber_hangTime
    - climber_pullUpLoad
    - climber_pullUps
  - Derived Attributes
    - climber_projectedAbillity()
  - Domain
    - CLIMBER_ID: Positive integer
    - climber_Height: integer
    - climber_Weight: integer
    - climber_hangWeight: integer
    - climber_hangTime: integer
    - climber_pullUpLoad: integer
    - climber_pullUps: integer
    - climber_projectedAbillity(): string



Crag (<ins>CRAG_ID</ins>, crag_Location, total_Climbs)
  - Primary Key
    - CRAG_ID
  - Attributes
    - crag_Location
    - total_Climbs
  - Domain
    - CRAG_ID: Positive integer
    - crag_Location: varChar
    - total_Climbs: int


Climbs(<ins>CRAG_ID</ins>, <ins>route_Name</ins>, route_Rating, route_Type, route_Height)
  - Primary Key
    - CRAG_ID
    - route_Name
  - Foreign Key
    - CRAG_ID
  - Attributes
    - route_Rating
    - route_Type
    - route_Height
  - Domain
    - CRAG_ID: Positive integer
    - route_Name: string
    - route_Rating: string
    - route_Type: string
    - route_Height: integer


Gear(<ins>GEAR_ID</ins>, gear_Name, gear_Type)
  - Primary Key
    - GEAR_ID
  - Foreign Key
    - GEAR_ID
  - Attributes
    - gear_Name
    - gear_Type
  - Domain
    - GEAR_ID: int
    - gear_Name: string
    - gear_Type: string


Owned Gear(<ins>CLIMBER_ID</ins>, <ins>GEAR_ID</ins>, quantity)
  - Primary Key
    - CLIMBER_ID
    - GEAR_ID
  - Foreign Key
    - CLIMBER_ID
    - GEAR_ID
  - Attributes
    - quantity
  - Domain
    - CLIMBER_ID: integer
    - GEAR_ID: integer
    - quantity: integer


Store(<ins>STORE_ID</ins>, <ins>GEAR_ID</ins>, store_Name, store_Location)
  - Primary Key
    - STORE_ID
    - GEAR_ID
  - Foreign Key
    - GEAR_ID
  - Attributes
    - store_Name
    - store_Location
  - Domain
    - STORE_ID: integer
    - GEAR_ID: integer
    - store_Name: string
    - store_Location: string



  
  
