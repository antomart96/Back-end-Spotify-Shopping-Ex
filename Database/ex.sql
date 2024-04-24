Ex1:
	SELECT name FROM students 
	INNER JOIN courses on students.course_id = courses.id 
	WHEREcourses.course_name = 'Math';

Ex2:
	SELECT * FROM pokemons 
	LEFT JOIN types on pokemons.type_id = types.id 
	WHERE types.type_name = 'Water';
Ex3:
	SELECT * FROM players 
	INNER JOIN clubs on players.club_id = clubs.id 
	WHERE clubs.club_name = 'Juventus';

	SELECT * FROM players 
	INNER JOIN countries on players.country_id = countries.id 
	WHERE countries.country_name = 'Portugal';
Ex4:
	SELECT books.title FROM books 
	LEFT JOIN authors ON books.author_id = authors.id 
	WHERE authors.name ='J.K. Rowling';

	SELECT books.title FROM books 
	INNER JOIN publishers on books.publisher_id = publishers.id 
	WHERE publishers.name = 'Penguin Random House';
Ex5:
	SELECT movies.title FROM movies 
	INNER JOIN directors ON movies.director_id = directors.id 
	WHERE directors.name = 'Christopher Nolan';

	SELECT actors.name FROM actors 
	INNER JOIN movies ON actors.id = movies.actor_id 
	WHERE movies.title = 'Inception';

	SELECT movies.title FROM movies 
	INNER JOIN genres ON movies.genre_id = genres.id 
	WHERE genres.genre_name = 'Action';
Ex6:
	SELECT tool_name FROM tools 
	INNER JOIN events ON tools.event_used_id = events.id 
	WHERE events.event_name ='Attack on Wayne Enterprises';

	SELECT allies.name FROM allies 
	INNER JOIN hideouts ON allies.hideout_known_id = hideouts.id 
	WHERE hideouts.hideout_name = 'Batcave';
Ex7:
    SELECT rangers.name, abilities.ability_name, weapons.weapon_name FROM rangers 
    INNER JOIN abilities ON rangers.ability_id = abilities.id 
    INNER JOIN weapons ON rangers.weapon_id = weapons.id 
    WHERE rangers.name = 'Red Ranger';

    SELECT rangers.name FROM rangers 
    INNER JOIN teams on rangers.team_id = teams.id 
    WHERE teams.team_name = 'Mighty Morphin';

    SELECT weapons.weapon_name FROM rangers 
    INNER JOIN weapons ON rangers.weapon_id = weapons.id 
    GROUP BY weapons.weapon_name;

    SELECT weapons.weapon_name,COUNT(weapons.id) AS numberOfRangers FROM rangers 
    INNER JOIN weapons ON rangers.weapon_id = weapons.id 
    GROUP BY weapons.weapon_name 
    HAVING numberOfRangers > 1;
Ex8:
    SELECT eco_warriors.name FROM eco_warriors 
	INNER JOIN powers ON eco_warriors.power_id = powers.id
	WHERE powers.power_type ='Elemental';

	SELECT villains.name FROM villains 
	INNER JOIN episode_details ON villains.id = episode_details.villain_id
	INNER JOIN eco_warriors ON eco_warriors.id = episode_details.eco_warrior_id
	INNER JOIN episodes ON episodes.id = episode_details.episode_id
	WHERE eco_warriors.name = 'Captain Planet';

	SELECT episodes.title FROM episodes 
	INNER JOIN episode_details on episodes.id = episode_details.episode_id
	INNER JOIN villains on villains.id = episode_details.villain_id
	WHERE 