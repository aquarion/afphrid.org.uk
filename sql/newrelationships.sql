CREATE TABLE relationship (
  id int(11) NOT NULL auto_increment,
  person_one int NOT NULL,
  person_two int NOT NULL,
  rel_onetwo tinytext NOT NULL,
  rel_twoone tinytext NOT NULL,
  status int(11) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;


#select *, personone.id as personone_id, persontwo.id as persontwo_id, relationship.id as relid from relationship, person as personone, person as persontwo where personone.name = relationship.person_one and persontwo.name = relationship.person_two order by relid asc

insert into relationship values (1, 1, 4, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (3, 5, 1, 'future sworn enemy', 'future sworn enemy', 2);

insert into relationship values (4, 7, 2, 'AFPiancee', 'AFPfiance', 2);

insert into relationship values (5, 7, 9, 'afpiancee', 'afpiance', 2);

insert into relationship values (14, 10, 11, 'afpfiancée', 'afpfiancé', 2);

insert into relationship values (16, 4, 13, 'AFPsheep', 'AFPWelshman', 2);

insert into relationship values (17, 13, 9, 'AFPnemesis', 'AFPnemesis', 2);

insert into relationship values (18, 11, 14, '#afpfiancé', '#afpfiancée', 2);

insert into relationship values (19, 10, 11, 'RL fiancée', 'RL fiancé', 2);

insert into relationship values (22, 4, 3, 'AFPsis', 'AFPsis', 2);

insert into relationship values (23, 15, 2, 'Rodent', 'attic-keeper', 2);

insert into relationship values (25, 2, 8, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (26, 9, 19, 'AFPiance', 'AFPiancee', 2);

insert into relationship values (27, 19, 4, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (28, 21, 1, 'worshipper', 'god', 2);

insert into relationship values (29, 22, 4, 'Mentress', 'Trainee Soubrette', 2);

insert into relationship values (30, 22, 23, 'AFPCorruptress', 'AFPet Sunflower Seed', 2);

insert into relationship values (31, 3, 22, 'AFPsecretary', 'AFPGuide', 2);

insert into relationship values (32, 1, 22, 'Afphiance', 'Afphiancee', 2);

insert into relationship values (33, 25, 19, 'mom', 'bratty', 2);

insert into relationship values (34, 25, 9, 'first afpiance', 'first afpiancee', 0);

insert into relationship values (35, 63, 11, 'afpfance', 'afpfance', 2);

insert into relationship values (36, 25, 63, 'official unafpiancee', 'official unafpiance', 2);

insert into relationship values (37, 5, 63, 'afpfiancee', 'afpfiancee', 2);

insert into relationship values (38, 30, 8, 'afpfiance', 'afpfiance', 2);

insert into relationship values (39, 4, 25, 'AFPbrat', 'AFPmum', 2);

insert into relationship values (40, 32, 25, 'AFPSexslave', 'AFPSexslave', 2);

insert into relationship values (41, 32, 16, 'AFPBrother', 'AFPSister', 2);

insert into relationship values (42, 34, 20, 'afpnephew', 'afpauntie', 2);

insert into relationship values (43, 34, 22, 'accompanist', 'backing singer', 2);

insert into relationship values (44, 13, 19, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (45, 13, 14, 'AFPbruv', 'AFPsis', 0);

insert into relationship values (46, 38, 39, 'evil twin', 'evil twin', 2);

insert into relationship values (47, 13, 19, 'AFPbruv', 'AFPsis', 2);

insert into relationship values (48, 35, 34, 'APFniece', 'AFPuncle', 2);

insert into relationship values (49, 35, 2, 'afpiancee', 'afpiance', 2);

insert into relationship values (50, 35, 30, 'afpiancee', 'afpiance', 2);

insert into relationship values (51, 41, 33, 'afpbrother', 'afpsister', 2);

insert into relationship values (52, 9, 20, 'High Priest of Procrastination', 'Goddess Of Procrastination', 2);

insert into relationship values (53, 9, 20, 'APFiance', 'AFPiancee', 2);

insert into relationship values (54, 11, 16, 'afpfiancé', 'afpfiancée', 2);

insert into relationship values (55, 9, 25, 'AFPiance', 'first AFPiancee', 2);

insert into relationship values (57, 30, 1, 'Amazed fan', 'idol', 2);

insert into relationship values (58, 46, 32, 'AFPhiancee', 'AFPhiance', 2);

insert into relationship values (59, 41, 36, 'male afpsister', 'afpsister', 2);

insert into relationship values (60, 10, 63, 'afpsis', 'afpbro', 2);

insert into relationship values (61, 36, 32, 'owner', 'sceptula <SP?>', 2);

insert into relationship values (62, 7, 22, 'afpiancee', 'afpiancee', 2);

insert into relationship values (63, 1, 48, 'afpfiancé', 'afpfiancée', 2);

insert into relationship values (64, 50, 35, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (65, 10, 8, '#afpfiancée', '#afpfiancée', 2);

insert into relationship values (66, 11, 10, 'bitch, oh yes he is, now please put that dow... *aaaaaaargh*', 'boss.', 0);

insert into relationship values (68, 10, 11, 'boss', 'bitch, oh yes he is, now please put that dow... *aaaaaaaaaaaaaaargh*', 2);

insert into relationship values (69, 10, 36, 'afpfiancée', 'afpfiancée', 1);

insert into relationship values (70, 10, 39, 'seamstress', 'Mrs Palm', 2);

insert into relationship values (71, 10, 17, 'alter ego', 'alter ego', 1);

insert into relationship values (72, 11, 17, 'French maid', 'chef', 0);

insert into relationship values (73, 11, 35, 'afpfiancé', 'afpfiancée', 2);

insert into relationship values (74, 56, 13, 'Afpiancee', 'Afpiance', 2);

insert into relationship values (75, 56, 9, 'Afpiancee', 'Afpiance', 2);

insert into relationship values (76, 13, 56, 'AFPshepherd', 'AFPshepherdess', 2);

insert into relationship values (77, 13, 56, 'AFPfriend', 'AFPfriend', 2);

insert into relationship values (78, 2, 56, 'AFPfiance', 'AFPfiancee', 2);

insert into relationship values (79, 56, 63, 'afphiancee', 'afphiance', 2);

insert into relationship values (80, 56, 9, 'bigsis', 'lilbro', 2);

insert into relationship values (81, 60, 8, 'Sister', 'Sister', 0);

insert into relationship values (82, 60, 63, 'afpfiancee', 'afpfiancee', 0);

insert into relationship values (83, 2, 60, 'good influenced old fart', 'good influence', 2);

insert into relationship values (84, 8, 63, 'AFPfiance', 'AFPfiance', 2);

insert into relationship values (85, 8, 60, 'Evil Twin Sister', 'Evil Twin Sister', 2);

insert into relationship values (86, 61, 60, 'influencee', 'bad influence', 2);

insert into relationship values (87, 61, 10, 'afpfiance', 'afpfiancee', 2);

insert into relationship values (88, 5, 61, 'squid', 'cloggie', 2);

insert into relationship values (89, 13, 60, 'AFPYoungMan', 'AFPOlderWoman', 2);

insert into relationship values (90, 61, 5, 'cloggie', 'squid', 2);

insert into relationship values (91, 21, 63, 'afpfiancee', 'afpfiance', 2);

insert into relationship values (92, 21, 1, 'twin', 'twin', 2);

insert into relationship values (93, 18, 9, 'not-boyfriend', 'not-boyfriend', 2);

insert into relationship values (94, 61, 7, 'afpfiance', 'afpfiancee', 2);

insert into relationship values (95, 63, 25, 'official unafpiancee/official unafpiance', 'official unafpiancee/official unafpiance', 2);

insert into relationship values (96, 63, 8, 'afpfiancee', 'afpfiancee', 2);

insert into relationship values (97, 63, 10, 'afpsis/afpbro', 'afpsis/afpbro', 0);

insert into relationship values (98, 63, 56, 'afphiancee/afphiance.', 'afpsis/afpbroafphiancee/afphiance.', 2);

insert into relationship values (99, 63, 60, 'afpfiancee.', 'afpfiancee', 2);

insert into relationship values (100, 63, 21, 'afpfiancee.', 'afpfiance', 0);

insert into relationship values (101, 16, 11, 'afpdaughter', 'afpfather', 2);

insert into relationship values (102, 16, 11, 'afpkickerinnateef', 'afpkickeeinnateef', 2);

insert into relationship values (103, 16, 60, 'afpon the same wavelength', 'afpon the same wavelength', 2);

insert into relationship values (104, 11, 61, 'afpfiancé', 'afpfiancé', 2);

insert into relationship values (105, 21, 1, 'adoptee', 'adopter', 2);

insert into relationship values (106, 63, 14, 'afpfiance', 'affphiancee', 0);

insert into relationship values (107, 63, 46, 'afpfiance', 'affphiancee', 2);

insert into relationship values (108, 63, 46, 'afpfiance', 'afphiancee', 0);

insert into relationship values (109, 63, 22, 'afpfiance', 'afphiancee', 2);

insert into relationship values (110, 66, 33, 'afpfiance', 'afpfiancee', 2);

insert into relationship values (111, 60, 18, 'Willing Victim', 'AFPvamp', 2);

insert into relationship values (112, 60, 22, 'Lunatic Fringe Member', 'Lunatic Fringe Member', 2);

insert into relationship values (113, 22, 1, 'Supplemental Sibling', 'Supplemental Sibling', 2);

insert into relationship values (114, 63, 10, 'brother', 'sister', 0);

insert into relationship values (115, 63, 40, 'brother', 'sister', 2);

insert into relationship values (116, 67, 35, 'Afpfont', 'Afprecipient-of-fontishness', 2);

insert into relationship values (117, 33, 35, 'AFPDivine Advocate', 'AFPDevil's Advocate', 2);

insert into relationship values (118, 72, 33, 'AFPartiality', 'AFPartial', 2);

insert into relationship values (119, 63, 14, 'afpiance', 'afpiance', 0);

insert into relationship values (120, 63, 14, 'afpfiance', 'afpiance', 0);

insert into relationship values (121, 73, 13, 'mr mist', 'mr rhys', 2);

insert into relationship values (122, 73, 40, 'fluff slave', 'fluff daddy', 0);

insert into relationship values (123, 63, 14, 'afphiance', 'afphiance', 0);

insert into relationship values (124, 63, 14, 'afphiance', 'afphiance', 0);

insert into relationship values (125, 14, 63, '#afpiancee', '#afpiance', 2);

insert into relationship values (126, 63, 14, 'afphiance', 'afphiance', 0);

insert into relationship values (127, 63, 7, 'afphiance', 'afpfiancee', 1);

insert into relationship values (128, 42, 35, 'afpsister', 'afpsister', 2);

insert into relationship values (129, 35, 62, 'AFPfiancee', 'AFPfiancee', 1);

insert into relationship values (130, 76, 61, 'clone', 'clone', 2);

insert into relationship values (131, 2, 50, 'AFPchauffeured', 'AFPchauffeur', 2);

insert into relationship values (132, 50, 27, 'co-adulterer', 'co-adulterer', 2);

insert into relationship values (133, 80, 27, 'AFPfiance', 'AFPfiance', 2);

insert into relationship values (134, 83, 76, 'Clone', 'Clone', 2);

insert into relationship values (135, 83, 61, 'Clone', 'Clone', 2);

insert into relationship values (136, 84, 35, 'AFPfiance', 'AFPfiance', 1);

insert into relationship values (137, 85, 71, 'sister (irl)', 'sister (irl)', 2);

insert into relationship values (138, 85, 68, 'AFPiancee', 'AFPiance', 2);

insert into relationship values (139, 85, 63, 'AFPiancee', 'AFPiance', 2);

insert into relationship values (140, 85, 63, 'AFPiancee', 'AFPiance', 0);

insert into relationship values (141, 85, 20, 'AFPiance', 'AFPiance', 2);

insert into relationship values (142, 1, 85, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (143, 85, 9, 'AFPiance', 'AFPiance', 2);

insert into relationship values (144, 85, 4, 'AFPiance', 'AFPiance', 2);

insert into relationship values (145, 85, 19, 'AFPiance', 'AFPiance', 2);

insert into relationship values (146, 85, 19, 'AFPbig sis', 'AFPikkle sis', 2);

insert into relationship values (147, 63, 82, 'afphiace', 'afphiace', 2);

insert into relationship values (148, 63, 70, 'not-#afpfinacee', 'not-#afpfinacee', 0);

insert into relationship values (149, 70, 63, 'not-#afpfiancee', 'not-#afpfiance', 2);

insert into relationship values (150, 40, 6, 'afphiancee', 'afphiance', 2);

insert into relationship values (151, 40, 15, 'afpiancee', 'afpiancee', 2);

insert into relationship values (152, 66, 40, '#aftopicer', '#aftopicee', 2);

insert into relationship values (153, 66, 85, '#afpjiggleappreciator', '#afpjiggler', 2);

insert into relationship values (154, 87, 75, 'afpson', 'afpmother', 2);

insert into relationship values (155, 87, 62, 'afphiance', 'afphiancee', 1);

insert into relationship values (156, 87, 7, 'afphiance', 'afphiancee', 2);

insert into relationship values (157, 87, 22, 'afphiance', 'afphiancee', 2);

insert into relationship values (158, 85, 3, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (159, 85, 7, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (160, 85, 40, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (161, 85, 15, 'AFPiancee', 'AFPiancee', 2);

insert into relationship values (162, 87, 11, 'afphiance', 'afphiance', 2);

insert into relationship values (163, 88, 85, 'AFPhiance', 'AFPhiance', 2);

insert into relationship values (164, 90, 63, 'afpiancee', 'afpiance', 2);

insert into relationship values (165, 90, 61, 'afpiancee', 'afpiance', 2);

insert into relationship values (166, 85, 89, 'AFPbitontheside', 'AFPbitontheside', 2);

insert into relationship values (167, 63, 19, 'afpiance', 'afpiance', 2);

insert into relationship values (168, 56, 85, 'afpsis', 'afpsis', 2);

insert into relationship values (169, 6, 8, 'AFPbrother', 'AFPsister', 2);

insert into relationship values (170, 8, 71, 'AFPmum', 'afpdaughter', 2);

insert into relationship values (171, 71, 96, 'daughter (irl)', 'mum (irl)', 2);

insert into relationship values (172, 96, 85, 'mum (irl)', 'daughter (irl)', 2);

insert into relationship values (173, 6, 71, 'afpbrother', 'afpsister', 2);

insert into relationship values (174, 68, 71, 'AFP er?', 'AFP erm?', 2);

insert into relationship values (175, 68, 6, 'afpbug', 'afpbug', 2);

insert into relationship values (176, 99, 63, 'afphiancee', 'afphiance', 2);

insert into relationship values (177, 75, 100, 'AFPhiance', 'AFPhiancee', 1);

insert into relationship values (178, 75, 11, 'doppleganger', 'doppleganger', 0);

insert into relationship values (179, 102, 94, 'afpiance', 'maid of honour', 2);

insert into relationship values (180, 102, 1, 'evil twin', 'good twin', 2);

insert into relationship values (181, 102, 20, 'afpiance', 'afpiancee', 2);

insert into relationship values (182, 102, 34, 'afpiance', 'afpiance', 2);

insert into relationship values (183, 102, 85, 'afpiance', 'afpiancee', 2);

insert into relationship values (184, 102, 60, 'james', 'jesse', 2);

insert into relationship values (185, 102, 35, 'afpiance', 'afpiancee', 2);

insert into relationship values (186, 102, 22, 'reputation', 'reputor', 1);

insert into relationship values (187, 102, 11, 'afpiance', 'afpiance', 2);

insert into relationship values (188, 102, 4, 'james', 'meowth', 2);

insert into relationship values (189, 101, 85, '#afpfiancee', '#afpfiancee', 2);

insert into relationship values (190, 101, 68, '*hug*er', '*hug*ee', 2);

insert into relationship values (191, 60, 4, 'Jesse', 'Meowth', 2);

insert into relationship values (192, 20, 61, 'afpiancee', 'afpiance', 2);

insert into relationship values (193, 102, 9, 'calvin', 'hobbes', 2);

insert into relationship values (194, 85, 103, 'AFPiancee (eloped)', 'AFPiance (eloped)', 0);

insert into relationship values (195, 103, 10, '#AFPdopted son', '#AFPdopted mum', 2);

insert into relationship values (196, 75, 11, 'alter ego', 'alter ego', 2);

insert into relationship values (197, 2, 40, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (198, 33, 93, 'AFPsister', 'AFPbrother', 2);

insert into relationship values (199, 46, 93, 'AFPhiancee', 'AFPhiance', 2);

insert into relationship values (200, 25, 50, 'owner of cold ankles', 'ankle warmer', 2);

insert into relationship values (201, 109, 63, 'afpfiancee', 'afpfiance', 2);

insert into relationship values (202, 109, 9, 'afpfiancee', 'afpfiance', 2);

insert into relationship values (203, 110, 2, 'friend', 'friend', 2);

insert into relationship values (204, 110, 15, 'person she met once', 'person she met once', 2);

insert into relationship values (205, 6, 7, 'afpiance', 'afpiance', 2);

insert into relationship values (206, 92, 93, 'AFPotherRee', 'AFPotherMark', 2);

insert into relationship values (207, 85, 103, 'AFPwife', 'AFPhusband', 2);

insert into relationship values (208, 114, 40, 'AFPhiance', 'AFPhiance', 2);

insert into relationship values (209, 66, 40, 'afpfiance', 'afpfiancee', 2);

insert into relationship values (210, 116, 21, 'AFPfriend', 'AFPfriend', 2);

insert into relationship values (211, 40, 2, 'big sister', 'little brother', 2);

insert into relationship values (212, 40, 114, 'Owner', 'Genie', 2);

insert into relationship values (213, 10, 4, 'afpmistress', 'afpmistress', 2);

insert into relationship values (214, 101, 68, 'actualfiancee', 'actualfiance', 1);

insert into relationship values (215, 4, 82, 'afpiancée', 'afpiancée', 2);

insert into relationship values (216, 6, 108, 'afpiance', 'afpiance', 0);

insert into relationship values (217, 108, 6, 'AFPhiancee', 'AFPhiancee', 2);

insert into relationship values (218, 124, 40, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (219, 2, 108, 'afpsink', 'afpsauce', 2);

insert into relationship values (220, 125, 108, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (221, 125, 20, 'AFPhiance', 'AFPhiancee', 2);

insert into relationship values (222, 125, 122, 'AFPbigbrother', 'AFPlittlesister', 2);

insert into relationship values (223, 122, 117, 'AFPlittlesister', 'AFPbigsister', 2);

insert into relationship values (224, 126, 70, 'Brother', 'Sister', 2);

insert into relationship values (225, 91, 108, 'Friend', 'anchor in sanity', 2);

insert into relationship values (226, 60, 124, 'AFPparent', 'AFPson', 2);

insert into relationship values (227, 127, 63, 'AFPwife', 'AFPhusband', 2);

insert into relationship values (228, 127, 40, 'other Israeli AFPer', 'other Israeli AFPer', 2);

insert into relationship values (229, 41, 53, 'pi-th afpcousin', 'afpi-th cousin', 1);

insert into relationship values (230, 60, 131, 'AFPmum', 'AFPdaughter', 2);

insert into relationship values (231, 71, 131, '#afpdaughter', '#afpmum', 2);

insert into relationship values (232, 71, 130, '#afpdaughter', '#afpdad', 2);

insert into relationship values (233, 131, 124, 'sister', 'sister', 2);

insert into relationship values (234, 131, 3, '#afpiancee', '#afpiancee', 2);

insert into relationship values (235, 21, 4, 'twin', 'twin', 2);

insert into relationship values (236, 103, 85, 'waterer', 'afpidistra', 2);

insert into relationship values (237, 71, 117, '#afpsister', '#afpsister', 2);

insert into relationship values (238, 66, 71, '#afpsomething', '#afpsomething', 2);

insert into relationship values (239, 116, 71, 'afpsomethingelse', 'afpsomethingelse', 2);

insert into relationship values (240, 122, 71, 'AFPsisterinunderagesnoggery', 'AFPsisterinunderagesnoggery', 2);

insert into relationship values (241, 89, 71, 'owner', 'pet', 2);

insert into relationship values (242, 4, 108, 'afpcorruptress', 'afpcorruptee', 2);

insert into relationship values (243, 122, 136, 'AFPstalker', 'AFPstalkee', 2);

insert into relationship values (244, 136, 4, 'AFPAnnoyance', 'AFPgorgeousness', 0);

insert into relationship values (245, 122, 131, 'AFPsexyfriend', 'AFPsexyfriend', 2);

insert into relationship values (246, 137, 25, 'AFPsis', 'AFPsis', 2);

insert into relationship values (247, 137, 63, 'AFPfiance', 'AFPfiance', 2);

insert into relationship values (248, 137, 32, 'AFPiance', 'AFPiance', 2);

insert into relationship values (249, 137, 60, 'AFPsis', 'AFPsis', 0);

insert into relationship values (250, 137, 9, 'AFPsis', 'AFpbruv', 1);

insert into relationship values (251, 137, 134, 'AFPsis', 'AFPsis', 2);

insert into relationship values (252, 137, 36, 'AFPsis', 'AFPsis', 1);

insert into relationship values (253, 137, 4, 'AFPsis', 'AFPsis', 0);

insert into relationship values (254, 137, 19, 'AFPlilbigsis', 'AFPbiglilsis', 0);

insert into relationship values (255, 137, 93, 'AFPfiance', 'AFPfiance', 2);

insert into relationship values (256, 137, 82, 'afpsis', 'afpsis', 2);

insert into relationship values (257, 137, 60, 'AFPsis', 'AFPsis', 2);

insert into relationship values (258, 6, 96, 'afpson', 'afpmum', 1);

insert into relationship values (259, 127, 12, 'AFPTwin Sister', 'AFPTwin Brother', 2);

insert into relationship values (260, 91, 71, 'afpstep cousin once removed', 'afpstep cousin once removed', 2);

insert into relationship values (261, 136, 3, 'bunad fitter', 'torturer with blunt objects', 2);

insert into relationship values (262, 136, 4, 'persona non grata', 'null pointer reference', 0);

insert into relationship values (263, 25, 137, 'HONEY!!!', 'SWEETIE!!!', 2);

insert into relationship values (264, 4, 116, 'zombie brain-share coparticipant', 'zombie brain-share coparticipant', 2);

insert into relationship values (265, 4, 22, 'agneau', 'bergere', 1);

insert into relationship values (266, 32, 85, 'Other bit on the side', 'Wonderful and Wanton mistress', 2);

insert into relationship values (267, 71, 88, 'AFPhiance', 'AFPhiance', 2);

insert into relationship values (268, 6, 108, 'AFPworshipper', 'AFPGoddess', 2);

insert into relationship values (269, 124, 71, 'AFPuncle', 'AFPcousin', 0);

insert into relationship values (270, 124, 71, 'AFPuncle', 'AFPcousin', 2);

insert into relationship values (271, 124, 3, 'afpbrother', 'afpsister', 2);

insert into relationship values (272, 125, 117, 'Cuddlee', 'Cuddler', 2);

insert into relationship values (273, 46, 137, 'AFPsis', 'AFPsis', 1);

insert into relationship values (274, 71, 4, 'AFPhiance', 'AFPhiance', 2);

insert into relationship values (275, 139, 83, 'vicious battle companion', 'vicious battle companion', 2);

insert into relationship values (276, 122, 136, 'AFPhiancee', 'AFPhiance', 2);

insert into relationship values (277, 124, 122, '#afpNiceDad', '#afpCuteDaughter', 2);

insert into relationship values (278, 117, 3, '#AFPsister', '#Afpsister', 2);

insert into relationship values (279, 124, 116, 'Innocent Stepson', 'Evil Stepdad', 2);

insert into relationship values (280, 116, 60, 'cccb suppliee', 'cccb supplier', 2);

insert into relationship values (281, 108, 13, 'afpMe', 'afpMe', 2);

insert into relationship values (282, 60, 108, 'Afpadopter', 'Afpadoptee', 2);

insert into relationship values (283, 60, 21, 'Afpadopter', 'Afpadoptee', 2);

insert into relationship values (284, 21, 108, 'Afpsister', 'Afpsister', 2);

insert into relationship values (285, 60, 142, 'Afpadopter', 'Afpadoptee', 2);

insert into relationship values (286, 21, 142, 'Afpsister', 'Afpbrother', 2);

insert into relationship values (287, 144, 137, 'AFPDarcy', 'AFOLizzie', 1);

insert into relationship values (288, 144, 25, 'AFPhiance', 'AFPhiancee', 1);

insert into relationship values (289, 144, 19, 'AFPBruv', 'AFPsis', 2);


