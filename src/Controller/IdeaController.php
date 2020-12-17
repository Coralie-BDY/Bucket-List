<?php


namespace App\Controller;


use App\Entity\Idea;
use App\Form\IdeaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IdeaController extends AbstractController
{
    /**
     * @Route("ideas", name="idea_list")
     */
    public function list(EntityManagerInterface $em)
    {
        $repo = $em->getRepository(Idea::class);
        $ideas = $repo->findListIdeasWithCategories();;

        return $this->render("idea/list.html.twig", ["ideas"=>$ideas]);
    }

    /**
     * @Route("/ideas/{id}", name="idea_detail", requirements={"id": "\d+"})
     */
    public function detail(int $id, EntityManagerInterface $em)
    {
        $repo = $em->getRepository(Idea::class);
        $idea = $repo->find($id);

        return $this->render("idea/detail.html.twig", ["idea"=>$idea]);
    }
    /**
     * @Route("/ideas/add", name="idea_add")
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $idea = new Idea();
        $idea->setDateCreated(new \DateTime());
        $ideaForm = $this->createForm(IdeaType::class, $idea);

        $ideaForm->handleRequest($request);
        if ($ideaForm->isSubmitted() && $ideaForm->isValid()){
            $idea->setIsPublished(true);
            $em->persist($idea);
            $em->flush();

            $this->addFlash("success", "Idea successfully saved!");
            return $this->redirectToRoute('idea_detail',['id' => $idea->getId()]);
        }

        return $this->render("idea/add.html.twig", ["ideaForm" => $ideaForm->createView()]);
    }

}