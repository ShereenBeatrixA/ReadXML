import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.w3c.dom.Node;
import org.w3c.dom.Element;
import java.io.File;

public class baca {
    public static void main(String argv[]) {
    String [] m = {"Maskapai RS","Maskapai CH", "Maskapai MS"};
    String [] f = {"maskapaiRS.xml","maskapaiCH.xml", "maskapaiMS.xml"};
    for (int i = 0; i<3; i++){   
    System.out.println("====="+m[i]+"=====");
    try {
        File fXmlFile = new File(f[i]);
        DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
        Document doc = dBuilder.parse(fXmlFile);
        doc.getDocumentElement().normalize();
        System.out.println("Root element :" + doc.getDocumentElement().getNodeName());
        NodeList nList = doc.getElementsByTagName("flight");
        for (int temp = 0; temp < nList.getLength(); temp++) {
            Node nNode = nList.item(temp);
            System.out.println("\nCurrent Element :" + nNode.getNodeName());
            if (nNode.getNodeType() == Node.ELEMENT_NODE) {
                Element eElement = (Element) nNode;
                System.out.println("ID : " + eElement.getElementsByTagName("id").item(0).getTextContent());
                System.out.println("From : " + eElement.getElementsByTagName("dari").item(0).getTextContent());
                System.out.println("To : " + eElement.getElementsByTagName("ke").item(0).getTextContent());
                System.out.println("Depart : " + eElement.getElementsByTagName("depart").item(0).getTextContent());
                System.out.println("Arrive : " + eElement.getElementsByTagName("arrive").item(0).getTextContent());
                System.out.println("Price : " + eElement.getElementsByTagName("price").item(0).getTextContent());

            }
        }
    } catch (Exception e) {
        e.printStackTrace();
    }
        System.out.println(" ");
    }
    }
}