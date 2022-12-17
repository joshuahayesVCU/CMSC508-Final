<h2>Sample Data</h2>

Climber (<ins>CLIMBER_ID</ins>, climber_Name, climber_Location)

| **CLIMBER_ID** 	| **climber_Name** 	| **climber_Location** 	|
|----------------	|------------------	|----------------------	|
| 01             	| Kyle Perry       	| Richmond             	|
| 02             	| Joshua Hayes     	| Richmond             	|
| 03             	| Alex Honnold     	| San Francisco        	|
| 04             	| Adam Ondra       	| Brno                 	|

Fitness (<ins>CLIMBER_ID</ins>, climber_Height, climber_Weight, climber_hangWeight, climber_hangTime, climber_pullUpLoad, climber_pullUps, climber_projectedAbillity())

| **CLIMBER_ID** 	| **climber_Height** 	| **climber_Weight** 	| **climber_hangWeight** 	| **climber_hangTime** 	| **climber_pullUpLoad** 	| **climber_pullUps** 	| **climber_projectedAbillity()** 	|
|----------------	|--------------------	|--------------------	|------------------------	|----------------------	|------------------------	|---------------------	|---------------------------------	|
| 01             	| 75                 	| 190                	| 45                     	| 7                    	| 50                     	| 5                   	| 7A                              	|
| 02             	| 68                 	| 135                	| 60                     	| 7                    	| 60                     	| 8                   	| 7B+                             	|
| 03             	| 68                 	| 125                	| 120                    	| 10                   	| 90                     	| 10                  	| 8B+                             	|
| 04             	| 73                 	| 150                	| 165                    	| 17                   	| 90                     	| 12                  	| 9A                              	|

Crag (<ins>CRAG_ID</ins>, crag_Name, crag_Location, total_Climbs)

| **CRAG_ID** | **crag_Name**       	| **crag_Location** | **total_Climbs** 	|
|------------	|---------------------	|---------------	  |-----------------	|
| 01      	  | Manchester Wall     	| Richmond      	  | 56              	|
| 02        	| Belle Isle Quarries 	| Richmond      	  | 17              	|

Climbs(CRAG_ID, route_Name, route_Rating, route_Type, route_Height)

| CRAG_ID 	| route_Name      	| route_Rating 	| route_Type 	| route_Height 	|
|---------	|-----------------	|--------------	|------------	|--------------	|
| 01      	| Tendinitis      	| 6b           	| TR, Sport  	| 60           	|
| 01      	| Root Canal      	| 5c           	| TR, Sport  	| 50           	|
| 02      	| Dynamite Shute  	| 5b           	| TR         	| 30           	|
| 02      	| Pulling Punches 	| 4c           	| TR, Sport  	| 30           	|

Gear(GEAR_ID, gear_Name, gear_Type)

| **GEAR_ID** 	| **gear_Name**          	| **gear_Type** 	|
|-------------	|------------------------	|---------------	|
| 01          	| Scarpa Helix           	| Shoes          	|
| 02          	| Petzl Gri Gri          	| Belay Device  	|
| 03          	| 60m Black Diamond Rope 	| Rope          	|

Owned Gear(CLIMBER_ID, GEAR_ID, quantity)

| CLIMBER_ID 	| GEAR_ID 	| quantity 	|
|------------	|---------	|----------	|
| 01         	| 01      	| 1        	|
| 02         	| 02      	| 1        	|
| 02         	| 03      	| 2        	|

Store(STORE_ID, GEAR_ID, store_Name, store_Location)

| **STORE_ID** 	| **GEAR_ID** 	| **store_Name**       	| **store_Location** 	|
|--------------	|-------------	|----------------------	|--------------------	|
| 01           	| 01          	| REI                  	| Richmond           	|
| 01           	| 03          	| REI                  	| Richmond           	|
| 02           	| 01          	| Walkabout Outfitters 	| Richmond           	|

