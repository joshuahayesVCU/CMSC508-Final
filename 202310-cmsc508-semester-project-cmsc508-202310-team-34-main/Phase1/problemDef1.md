<h1>Climbing Database - Phase 1</h1>


The world of climbing is a complex and confusing place, with lots of varied equipment and knowledge to correctly perform the sport. We have been climbing together for a little over 6 months now and share this love for climbing and computer science together. However, due to the innate complexity of climbing, we thought it would be best to create and connect databases to solve the problems we typically encounter. An example of a frequent problem we encounter is gear preparation. When travelling to a climbing hotspot, better known as a ‘CRAG’, having knowledge of what gear you need to bring for whichever type of climbing is critical for your success. Unfortunately, I only have so much gear, and information on these climbing locations isn’t necessarily fruitful. This is where our Database will come in handy. Let’s say we have a list of climbers containing valuable information pertaining to their climbing: the gear they own, their fitness levels, the CRAGs near them, their climbing abilities, etc. We can then take these aspects of climbing that pertain to each individual and provide a map of assistance and recommendations for their climbing enjoyment and success. We started off with an ERD Rough Draft of a conceptual data-model and included these aspects into the ERD. This draft was a good start into our visualization for what the project wanted to be. However, we were able to finalize what we wanted our database to accomplish when we proposed questions that it should solve, here are some examples:
-	What city has the most crags? 
-	Which crags can host x climbers?
-	Where is the easiest climb in x city?
-	Do I have enough gear to climb x route?
-	Where can I buy x gear?
-	Am I strong enough to climb route x?
-	What is my expected climbing ability?
-	What is the most common type of gear sold at store x?
-	Are there other climbers with my name?
-	What city has the strongest climber?
-	Where does climber x live?
-	How many trad/TR/boulders are at crag x?
-	How many climbers in city x can climb 6B?
-	How many of gear type x do I own?
-	What is the hardest climb at crag x?
-	How many climbers live in my city?
-	How many stores in city x sell gear y?
-	How long is route x?
-	What type of gear is gear name x?
-	What gear am I missing to climb route x?

After asking these questions, we were able to come up with our Final Draft, and the relationship between each element. With this setup we can easily answer all these questions and have reliable and relatable data for every climber who enters their information correctly.
