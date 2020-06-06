def divideAndSort(deret):
  #divide
  deret_split = deret.split('0')
  for i in range (0, len(deret_split)):
    deret = deret_split[i]
  #end of divide

    #parsing to list
    deret_list = []
    for i in range(0, len(deret)):
      deret_list.append(deret[i])
    #end of parsing to list
    
    #sort
    sorted = False
    while(sorted == False):
      sorted = True
      for j in range(0, len(deret_list)-1):
        if int(deret_list[j]) > int(deret_list[j+1]):
          deret_list[j], deret_list[j+1] = deret_list[j+1], deret_list[j]
          sorted = False
    #end of sort
    
    #print result
    for i in range(0, len(deret_list)):
      print(deret_list[i], end='')
  
deret = input()
divideAndSort(deret)    