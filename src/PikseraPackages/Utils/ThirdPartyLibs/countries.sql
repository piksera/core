CREATE TABLE IF NOT EXISTS {PS_TABLE_PREFIX}countries (
  id int(11) NOT NULL,
  code TEXT NOT NULL,
  name TEXT NOT NULL,
  continent LONGTEXT NOT NULL,
  surfacearea float NOT NULL,
  population int(11) NOT NULL,
  localname TEXT NOT NULL  ,
  phone_prefix TEXT DEFAULT NULL  ,

PRIMARY KEY (id)
);





REPLACE INTO {PS_TABLE_PREFIX}countries (id, code, name, continent, surfacearea, population, localname,phone_prefix) VALUES
  (1, 'AFG', 'Afghanistan', 'Asia', 652090, 22720000, 'Afganistan/Afqanestan'),
  (2, 'NLD', 'Netherlands', 'Europe', 41526, 15864000, 'Nederland'),
  (3, 'ANT', 'Netherlands Antilles', 'North America', 800, 217000, 'Nederlandse Antillen'),
  (4, 'ALB', 'Albania', 'Europe', 28748, 3401200, 'ShqipÃ«ria'),
  (5, 'DZA', 'Algeria', 'Africa', 2381741, 31471000, 'Al-Jazaâ€™ir/AlgÃ©rie'),
  (6, 'ASM', 'American Samoa', 'Oceania', 199, 68000, 'Amerika Samoa'),
  (7, 'AND', 'Andorra', 'Europe', 468, 78000, 'Andorra'),
  (8, 'AGO', 'Angola', 'Africa', 1246700, 12878000, 'Angola'),
  (9, 'AIA', 'Anguilla', 'North America', 96, 8000, 'Anguilla'),
  (10, 'ATG', 'Antigua and Barbuda', 'North America', 442, 68000, 'Antigua and Barbuda'),
  (11, 'ARE', 'United Arab Emirates', 'Asia', 83600, 2441000, 'Al-Imarat al-Â´Arabiya al-Muttahida'),
  (12, 'ARG', 'Argentina', 'South America', 2780400, 37032000, 'Argentina'),
  (13, 'ARM', 'Armenia', 'Asia', 29800, 3520000, 'Hajastan'),
  (14, 'ABW', 'Aruba', 'North America', 193, 103000, 'Aruba'),
  (15, 'AUS', 'Australia', 'Oceania', 7741220, 18886000, 'Australia'),
  (16, 'AZE', 'Azerbaijan', 'Asia', 86600, 7734000, 'AzÃ¤rbaycan'),
  (17, 'BHS', 'Bahamas', 'North America', 13878, 307000, 'The Bahamas'),
  (18, 'BHR', 'Bahrain', 'Asia', 694, 617000, 'Al-Bahrayn'),
  (19, 'BGD', 'Bangladesh', 'Asia', 143998, 129155000, 'Bangladesh'),
  (20, 'BRB', 'Barbados', 'North America', 430, 270000, 'Barbados'),
  (21, 'BEL', 'Belgium', 'Europe', 30518, 10239000, 'BelgiÃ«/Belgique'),
  (22, 'BLZ', 'Belize', 'North America', 22696, 241000, 'Belize'),
  (23, 'BEN', 'Benin', 'Africa', 112622, 6097000, 'BÃ©nin'),
  (24, 'BMU', 'Bermuda', 'North America', 53, 65000, 'Bermuda'),
  (25, 'BTN', 'Bhutan', 'Asia', 47000, 2124000, 'Druk-Yul'),
  (26, 'BOL', 'Bolivia', 'South America', 1098581, 8329000, 'Bolivia'),
  (27, 'BIH', 'Bosnia and Herzegovina', 'Europe', 51197, 3972000, 'Bosna i Hercegovina'),
  (28, 'BWA', 'Botswana', 'Africa', 581730, 1622000, 'Botswana'),
  (29, 'BRA', 'Brazil', 'South America', 8547403, 170115000, 'Brasil'),
  (30, 'GBR', 'United Kingdom', 'Europe', 242900, 59623400, 'United Kingdom'),
  (31, 'VGB', 'Virgin Islands, British', 'North America', 151, 21000, 'British Virgin Islands'),
  (32, 'BRN', 'Brunei', 'Asia', 5765, 328000, 'Brunei Darussalam'),
  (33, 'BGR', 'Bulgaria', 'Europe', 110994, 8190900, 'Balgarija'),
  (34, 'BFA', 'Burkina Faso', 'Africa', 274000, 11937000, 'Burkina Faso'),
  (35, 'BDI', 'Burundi', 'Africa', 27834, 6695000, 'Burundi/Uburundi'),
  (36, 'CYM', 'Cayman Islands', 'North America', 264, 38000, 'Cayman Islands'),
  (37, 'CHL', 'Chile', 'South America', 756626, 15211000, 'Chile'),
  (38, 'COK', 'Cook Islands', 'Oceania', 236, 20000, 'The Cook Islands'),
  (39, 'CRI', 'Costa Rica', 'North America', 51100, 4023000, 'Costa Rica'),
  (40, 'DJI', 'Djibouti', 'Africa', 23200, 638000, 'Djibouti/Jibuti'),
  (41, 'DMA', 'Dominica', 'North America', 751, 71000, 'Dominica'),
  (42, 'DOM', 'Dominican Republic', 'North America', 48511, 8495000, 'RepÃºblica Dominicana'),
  (43, 'ECU', 'Ecuador', 'South America', 283561, 12646000, 'Ecuador'),
  (44, 'EGY', 'Egypt', 'Africa', 1001449, 68470000, 'Misr'),
  (45, 'SLV', 'El Salvador', 'North America', 21041, 6276000, 'El Salvador'),
  (46, 'ERI', 'Eritrea', 'Africa', 117600, 3850000, 'Ertra'),
  (47, 'ESP', 'Spain', 'Europe', 505992, 39441700, 'EspaÃ±a'),
  (48, 'ZAF', 'South Africa', 'Africa', 1221037, 40377000, 'South Africa'),
  (49, 'ETH', 'Ethiopia', 'Africa', 1104300, 62565000, 'YeItyopÂ´iya'),
  (50, 'FLK', 'Falkland Islands', 'South America', 12173, 2000, 'Falkland Islands'),
  (51, 'FJI', 'Fiji Islands', 'Oceania', 18274, 817000, 'Fiji Islands'),
  (52, 'PHL', 'Philippines', 'Asia', 300000, 75967000, 'Pilipinas'),
  (53, 'FRO', 'Faroe Islands', 'Europe', 1399, 43000, 'FÃ¸royar'),
  (54, 'GAB', 'Gabon', 'Africa', 267668, 1226000, 'Le Gabon'),
  (55, 'GMB', 'Gambia', 'Africa', 11295, 1305000, 'The Gambia'),
  (56, 'GEO', 'Georgia', 'Asia', 69700, 4968000, 'Sakartvelo'),
  (57, 'GHA', 'Ghana', 'Africa', 238533, 20212000, 'Ghana'),
  (58, 'GIB', 'Gibraltar', 'Europe', 6, 25000, 'Gibraltar'),
  (59, 'GRD', 'Grenada', 'North America', 344, 94000, 'Grenada'),
  (60, 'GRL', 'Greenland', 'North America', 2166090, 56000, 'Kalaallit Nunaat/GrÃ¸nland'),
  (61, 'GLP', 'Guadeloupe', 'North America', 1705, 456000, 'Guadeloupe'),
  (62, 'GUM', 'Guam', 'Oceania', 549, 168000, 'Guam'),
  (63, 'GTM', 'Guatemala', 'North America', 108889, 11385000, 'Guatemala'),
  (64, 'GIN', 'Guinea', 'Africa', 245857, 7430000, 'GuinÃ©e'),
  (65, 'GNB', 'Guinea-Bissau', 'Africa', 36125, 1213000, 'GuinÃ©-Bissau'),
  (66, 'GUY', 'Guyana', 'South America', 214969, 861000, 'Guyana'),
  (67, 'HTI', 'Haiti', 'North America', 27750, 8222000, 'HaÃ¯ti/Dayti'),
  (68, 'HND', 'Honduras', 'North America', 112088, 6485000, 'Honduras'),
  (69, 'HKG', 'Hong Kong', 'Asia', 1075, 6782000, 'Xianggang/Hong Kong'),
  (70, 'SJM', 'Svalbard and Jan Mayen', 'Europe', 62422, 3200, 'Svalbard og Jan Mayen'),
  (71, 'IDN', 'Indonesia', 'Asia', 1904569, 212107000, 'Indonesia'),
  (72, 'IND', 'India', 'Asia', 3287263, 1013662000, 'Bharat/India'),
  (73, 'IRQ', 'Iraq', 'Asia', 438317, 23115000, 'Al-Â´Iraq'),
  (74, 'IRN', 'Iran', 'Asia', 1648195, 67702000, 'Iran'),
  (75, 'IRL', 'Ireland', 'Europe', 70273, 3775100, 'Ireland/Ã‰ire'),
  (76, 'ISL', 'Iceland', 'Europe', 103000, 279000, 'Ãsland'),
  (77, 'ISR', 'Israel', 'Asia', 21056, 6217000, 'Yisraâ€™el/Israâ€™il'),
  (78, 'ITA', 'Italy', 'Europe', 301316, 57680000, 'Italia'),
  (79, 'TMP', 'East Timor', 'Asia', 14874, 885000, 'Timor Timur'),
  (80, 'AUT', 'Austria', 'Europe', 83859, 8091800, 'Ã–sterreich'),
  (81, 'JAM', 'Jamaica', 'North America', 10990, 2583000, 'Jamaica'),
  (82, 'JPN', 'Japan', 'Asia', 377829, 126714000, 'Nihon/Nippon'),
  (83, 'YEM', 'Yemen', 'Asia', 527968, 18112000, 'Al-Yaman'),
  (84, 'JOR', 'Jordan', 'Asia', 88946, 5083000, 'Al-Urdunn'),
  (85, 'CXR', 'Christmas Island', 'Oceania', 135, 2500, 'Christmas Island'),
  (86, 'YUG', 'Yugoslavia', 'Europe', 102173, 10640000, 'Jugoslavija'),
  (87, 'KHM', 'Cambodia', 'Asia', 181035, 11168000, 'KÃ¢mpuchÃ©a'),
  (88, 'CMR', 'Cameroon', 'Africa', 475442, 15085000, 'Cameroun/Cameroon'),
  (89, 'CAN', 'Canada', 'North America', 9970610, 31147000, 'Canada'),
  (90, 'CPV', 'Cape Verde', 'Africa', 4033, 428000, 'Cabo Verde'),
  (91, 'KAZ', 'Kazakstan', 'Asia', 2724900, 16223000, 'Qazaqstan'),
  (92, 'KEN', 'Kenya', 'Africa', 580367, 30080000, 'Kenya'),
  (93, 'CAF', 'Central African Republic', 'Africa', 622984, 3615000, 'Centrafrique/BÃª-AfrÃ®ka'),
  (94, 'CHN', 'China', 'Asia', 9572900, 1277558000, 'Zhongquo'),
  (95, 'KGZ', 'Kyrgyzstan', 'Asia', 199900, 4699000, 'Kyrgyzstan'),
  (96, 'KIR', 'Kiribati', 'Oceania', 726, 83000, 'Kiribati'),
  (97, 'COL', 'Colombia', 'South America', 1138914, 42321000, 'Colombia'),
  (98, 'COM', 'Comoros', 'Africa', 1862, 578000, 'Komori/Comores'),
  (99, 'COG', 'Congo', 'Africa', 342000, 2943000, 'Congo'),
  (100, 'COD', 'Congo, The Democratic Republic of the', 'Africa', 2344858, 51654000, 'RÃ©publique DÃ©mocratique du Congo'),
  (101, 'CCK', 'Cocos (Keeling) Islands', 'Oceania', 14, 600, 'Cocos (Keeling) Islands'),
  (102, 'PRK', 'North Korea', 'Asia', 120538, 24039000, 'Choson Minjujuui InÂ´min Konghwaguk (Bukhan)'),
  (103, 'KOR', 'South Korea', 'Asia', 99434, 46844000, 'Taehan Minâ€™guk (Namhan)'),
  (104, 'GRC', 'Greece', 'Europe', 131626, 10545700, 'EllÃ¡da'),
  (105, 'HRV', 'Croatia', 'Europe', 56538, 4473000, 'Hrvatska'),
  (106, 'CUB', 'Cuba', 'North America', 110861, 11201000, 'Cuba'),
  (107, 'KWT', 'Kuwait', 'Asia', 17818, 1972000, 'Al-Kuwayt'),
  (108, 'CYP', 'Cyprus', 'Asia', 9251, 754700, 'KÃ½pros/Kibris'),
  (109, 'LAO', 'Laos', 'Asia', 236800, 5433000, 'Lao'),
  (110, 'LVA', 'Latvia', 'Europe', 64589, 2424200, 'Latvija'),
  (111, 'LSO', 'Lesotho', 'Africa', 30355, 2153000, 'Lesotho'),
  (112, 'LBN', 'Lebanon', 'Asia', 10400, 3282000, 'Lubnan'),
  (113, 'LBR', 'Liberia', 'Africa', 111369, 3154000, 'Liberia'),
  (114, 'LBY', 'Libyan Arab Jamahiriya', 'Africa', 1759540, 5605000, 'Libiya'),
  (115, 'LIE', 'Liechtenstein', 'Europe', 160, 32300, 'Liechtenstein'),
  (116, 'LTU', 'Lithuania', 'Europe', 65301, 3698500, 'Lietuva'),
  (117, 'LUX', 'Luxembourg', 'Europe', 2586, 435700, 'Luxembourg/LÃ«tzebuerg'),
  (118, 'ESH', 'Western Sahara', 'Africa', 266000, 293000, 'As-Sahrawiya'),
  (119, 'MAC', 'Macao', 'Asia', 18, 473000, 'Macau/Aomen'),
  (120, 'MDG', 'Madagascar', 'Africa', 587041, 15942000, 'Madagasikara/Madagascar'),
  (121, 'MKD', 'Macedonia', 'Europe', 25713, 2024000, 'Makedonija'),
  (122, 'MWI', 'Malawi', 'Africa', 118484, 10925000, 'Malawi'),
  (123, 'MDV', 'Maldives', 'Asia', 298, 286000, 'Dhivehi Raajje/Maldives'),
  (124, 'MYS', 'Malaysia', 'Asia', 329758, 22244000, 'Malaysia'),
  (125, 'MLI', 'Mali', 'Africa', 1240192, 11234000, 'Mali'),
  (126, 'MLT', 'Malta', 'Europe', 316, 380200, 'Malta'),
  (127, 'MAR', 'Morocco', 'Africa', 446550, 28351000, 'Al-Maghrib'),
  (128, 'MHL', 'Marshall Islands', 'Oceania', 181, 64000, 'Marshall Islands/Majol'),
  (129, 'MTQ', 'Martinique', 'North America', 1102, 395000, 'Martinique'),
  (130, 'MRT', 'Mauritania', 'Africa', 1025520, 2670000, 'Muritaniya/Mauritanie'),
  (131, 'MUS', 'Mauritius', 'Africa', 2040, 1158000, 'Mauritius'),
  (132, 'MYT', 'Mayotte', 'Africa', 373, 149000, 'Mayotte'),
  (133, 'MEX', 'Mexico', 'North America', 1958201, 98881000, 'MÃ©xico'),
  (134, 'FSM', 'Micronesia, Federated States of', 'Oceania', 702, 119000, 'Micronesia'),
  (135, 'MDA', 'Moldova', 'Europe', 33851, 4380000, 'Moldova'),
  (136, 'MCO', 'Monaco', 'Europe', 1.5, 34000, 'Monaco'),
  (137, 'MNG', 'Mongolia', 'Asia', 1566500, 2662000, 'Mongol Uls'),
  (138, 'MSR', 'Montserrat', 'North America', 102, 11000, 'Montserrat'),
  (139, 'MOZ', 'Mozambique', 'Africa', 801590, 19680000, 'MoÃ§ambique'),
  (140, 'MMR', 'Myanmar', 'Asia', 676578, 45611000, 'Myanma Pye'),
  (141, 'NAM', 'Namibia', 'Africa', 824292, 1726000, 'Namibia'),
  (142, 'NRU', 'Nauru', 'Oceania', 21, 12000, 'Naoero/Nauru'),
  (143, 'NPL', 'Nepal', 'Asia', 147181, 23930000, 'Nepal'),
  (144, 'NIC', 'Nicaragua', 'North America', 130000, 5074000, 'Nicaragua'),
  (145, 'NER', 'Niger', 'Africa', 1267000, 10730000, 'Niger'),
  (146, 'NGA', 'Nigeria', 'Africa', 923768, 111506000, 'Nigeria'),
  (147, 'NIU', 'Niue', 'Oceania', 260, 2000, 'Niue'),
  (148, 'NFK', 'Norfolk Island', 'Oceania', 36, 2000, 'Norfolk Island'),
  (149, 'NOR', 'Norway', 'Europe', 323877, 4478500, 'Norge'),
  (150, 'CIV', 'Cote d\'Ivoire', 'Africa', 322463, 14786000, 'CÃ´te dâ€™Ivoire'),
  (151, 'OMN', 'Oman', 'Asia', 309500, 2542000, 'Â´Uman'),
  (152, 'PAK', 'Pakistan', 'Asia', 796095, 156483000, 'Pakistan'),
  (153, 'PLW', 'Palau', 'Oceania', 459, 19000, 'Belau/Palau'),
  (154, 'PAN', 'Panama', 'North America', 75517, 2856000, 'PanamÃ¡'),
  (155, 'PNG', 'Papua New Guinea', 'Oceania', 462840, 4807000, 'Papua New Guinea/Papua Niugini'),
  (156, 'PRY', 'Paraguay', 'South America', 406752, 5496000, 'Paraguay'),
  (157, 'PER', 'Peru', 'South America', 1285216, 25662000, 'PerÃº/Piruw'),
  (158, 'PCN', 'Pitcairn', 'Oceania', 49, 50, 'Pitcairn'),
  (159, 'MNP', 'Northern Mariana Islands', 'Oceania', 464, 78000, 'Northern Mariana Islands'),
  (160, 'PRT', 'Portugal', 'Europe', 91982, 9997600, 'Portugal'),
  (161, 'PRI', 'Puerto Rico', 'North America', 8875, 3869000, 'Puerto Rico'),
  (162, 'POL', 'Poland', 'Europe', 323250, 38653600, 'Polska'),
  (163, 'GNQ', 'Equatorial Guinea', 'Africa', 28051, 453000, 'Guinea Ecuatorial'),
  (164, 'QAT', 'Qatar', 'Asia', 11000, 599000, 'Qatar'),
  (165, 'FRA', 'France', 'Europe', 551500, 59225700, 'France'),
  (166, 'GUF', 'French Guiana', 'South America', 90000, 181000, 'Guyane franÃ§aise'),
  (167, 'PYF', 'French Polynesia', 'Oceania', 4000, 235000, 'PolynÃ©sie franÃ§aise'),
  (168, 'REU', 'Reunion', 'Africa', 2510, 699000, 'RÃ©union'),
  (169, 'ROM', 'Romania', 'Europe', 238391, 22455500, 'RomÃ¢nia'),
  (170, 'RWA', 'Rwanda', 'Africa', 26338, 7733000, 'Rwanda/Urwanda'),
  (171, 'SWE', 'Sweden', 'Europe', 449964, 8861400, 'Sverige'),
  (172, 'SHN', 'Saint Helena', 'Africa', 314, 6000, 'Saint Helena'),
  (173, 'KNA', 'Saint Kitts and Nevis', 'North America', 261, 38000, 'Saint Kitts and Nevis'),
  (174, 'LCA', 'Saint Lucia', 'North America', 622, 154000, 'Saint Lucia'),
  (175, 'VCT', 'Saint Vincent and the Grenadines', 'North America', 388, 114000, 'Saint Vincent and the Grenadines'),
  (176, 'SPM', 'Saint Pierre and Miquelon', 'North America', 242, 7000, 'Saint-Pierre-et-Miquelon'),
  (177, 'DEU', 'Germany', 'Europe', 357022, 82164700, 'Deutschland'),
  (178, 'SLB', 'Solomon Islands', 'Oceania', 28896, 444000, 'Solomon Islands'),
  (179, 'ZMB', 'Zambia', 'Africa', 752618, 9169000, 'Zambia'),
  (180, 'WSM', 'Samoa', 'Oceania', 2831, 180000, 'Samoa'),
  (181, 'SMR', 'San Marino', 'Europe', 61, 27000, 'San Marino'),
  (182, 'STP', 'Sao Tome and Principe', 'Africa', 964, 147000, 'SÃ£o TomÃ© e PrÃ­ncipe'),
  (183, 'SAU', 'Saudi Arabia', 'Asia', 2149690, 21607000, 'Al-Â´Arabiya as-SaÂ´udiya'),
  (184, 'SEN', 'Senegal', 'Africa', 196722, 9481000, 'SÃ©nÃ©gal/Sounougal'),
  (185, 'SYC', 'Seychelles', 'Africa', 455, 77000, 'Sesel/Seychelles'),
  (186, 'SLE', 'Sierra Leone', 'Africa', 71740, 4854000, 'Sierra Leone'),
  (187, 'SGP', 'Singapore', 'Asia', 618, 3567000, 'Singapore/Singapura/Xinjiapo/Singapur'),
  (188, 'SVK', 'Slovakia', 'Europe', 49012, 5398700, 'Slovensko'),
  (189, 'SVN', 'Slovenia', 'Europe', 20256, 1987800, 'Slovenija'),
  (190, 'SOM', 'Somalia', 'Africa', 637657, 10097000, 'Soomaaliya'),
  (191, 'LKA', 'Sri Lanka', 'Asia', 65610, 18827000, 'Sri Lanka/Ilankai'),
  (192, 'SDN', 'Sudan', 'Africa', 2505813, 29490000, 'As-Sudan'),
  (193, 'FIN', 'Finland', 'Europe', 338145, 5171300, 'Suomi'),
  (194, 'SUR', 'Suriname', 'South America', 163265, 417000, 'Suriname'),
  (195, 'SWZ', 'Swaziland', 'Africa', 17364, 1008000, 'kaNgwane'),
  (196, 'CHE', 'Switzerland', 'Europe', 41284, 7160400, 'Schweiz/Suisse/Svizzera/Svizra'),
  (197, 'SYR', 'Syria', 'Asia', 185180, 16125000, 'Suriya'),
  (198, 'TJK', 'Tajikistan', 'Asia', 143100, 6188000, 'ToÃ§ikiston'),
  (199, 'TWN', 'Taiwan', 'Asia', 36188, 22256000, 'Tâ€™ai-wan'),
  (200, 'TZA', 'Tanzania', 'Africa', 883749, 33517000, 'Tanzania'),
  (201, 'DNK', 'Denmark', 'Europe', 43094, 5330000, 'Danmark'),
  (202, 'THA', 'Thailand', 'Asia', 513115, 61399000, 'Prathet Thai'),
  (203, 'TGO', 'Togo', 'Africa', 56785, 4629000, 'Togo'),
  (204, 'TKL', 'Tokelau', 'Oceania', 12, 2000, 'Tokelau'),
  (205, 'TON', 'Tonga', 'Oceania', 650, 99000, 'Tonga'),
  (206, 'TTO', 'Trinidad and Tobago', 'North America', 5130, 1295000, 'Trinidad and Tobago'),
  (207, 'TCD', 'Chad', 'Africa', 1284000, 7651000, 'Tchad/Tshad'),
  (208, 'CZE', 'Czech Republic', 'Europe', 78866, 10278100, 'Â¸esko'),
  (209, 'TUN', 'Tunisia', 'Africa', 163610, 9586000, 'Tunis/Tunisie'),
  (210, 'TUR', 'Turkey', 'Asia', 774815, 66591000, 'TÃ¼rkiye'),
  (211, 'TKM', 'Turkmenistan', 'Asia', 488100, 4459000, 'TÃ¼rkmenostan'),
  (212, 'TCA', 'Turks and Caicos Islands', 'North America', 430, 17000, 'The Turks and Caicos Islands'),
  (213, 'TUV', 'Tuvalu', 'Oceania', 26, 12000, 'Tuvalu'),
  (214, 'UGA', 'Uganda', 'Africa', 241038, 21778000, 'Uganda'),
  (215, 'UKR', 'Ukraine', 'Europe', 603700, 50456000, 'Ukrajina'),
  (216, 'HUN', 'Hungary', 'Europe', 93030, 10043200, 'MagyarorszÃ¡g'),
  (217, 'URY', 'Uruguay', 'South America', 175016, 3337000, 'Uruguay'),
  (218, 'NCL', 'New Caledonia', 'Oceania', 18575, 214000, 'Nouvelle-CalÃ©donie'),
  (219, 'NZL', 'New Zealand', 'Oceania', 270534, 3862000, 'New Zealand/Aotearoa'),
  (220, 'UZB', 'Uzbekistan', 'Asia', 447400, 24318000, 'Uzbekiston'),
  (221, 'BLR', 'Belarus', 'Europe', 207600, 10236000, 'Belarus'),
  (222, 'WLF', 'Wallis and Futuna', 'Oceania', 200, 15000, 'Wallis-et-Futuna'),
  (223, 'VUT', 'Vanuatu', 'Oceania', 12189, 190000, 'Vanuatu'),
  (224, 'VAT', 'Holy See (Vatican City State)', 'Europe', 0.4, 1000, 'Santa Sede/CittÃ  del Vaticano'),
  (225, 'VEN', 'Venezuela', 'South America', 912050, 24170000, 'Venezuela'),
  (226, 'RUS', 'Russian Federation', 'Europe', 17075400, 146934000, 'Rossija'),
  (227, 'VNM', 'Vietnam', 'Asia', 331689, 79832000, 'ViÃªt Nam'),
  (228, 'EST', 'Estonia', 'Europe', 45227, 1439200, 'Eesti'),
  (229, 'USA', 'United States', 'North America', 9363520.00000001, 278357000, 'United States'),
  (230, 'VIR', 'Virgin Islands, U.S.', 'North America', 347, 93000, 'Virgin Islands of the United States'),
  (231, 'ZWE', 'Zimbabwe', 'Africa', 390757, 11669000, 'Zimbabwe'),
  (232, 'PSE', 'Palestine', 'Asia', 6257, 3101000, 'Filastin'),
  (233, 'ATA', 'Antarctica', 'Antarctica', 13120000, 0, 'â€“'),
  (234, 'BVT', 'Bouvet Island', 'Antarctica', 59, 0, 'BouvetÃ¸ya'),
  (235, 'IOT', 'British Indian Ocean Territory', 'Africa', 78, 0, 'British Indian Ocean Territory'),
  (236, 'SGS', 'South Georgia and the South Sandwich Islands', 'Antarctica', 3903, 0, 'South Georgia and the South Sandwich Islands'),
  (237, 'HMD', 'Heard Island and McDonald Islands', 'Antarctica', 359, 0, 'Heard and McDonald Islands'),
  (238, 'ATF', 'French Southern territories', 'Antarctica', 7780, 0, 'Terres australes franÃ§aises'),
  (239, 'UMI', 'United States Minor Outlying Islands', 'Oceania', 16, 0, 'United States Minor Outlying Islands');


