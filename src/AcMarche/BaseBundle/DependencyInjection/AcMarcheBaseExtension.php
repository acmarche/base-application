<?php

namespace AcMarche\BaseBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class AcMarcheBaseExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (isset($bundles['TwigBundle'])) {
            $this->loadDefaultValuesTwig($container);
        }

        if (isset($bundles['FOSUserBundle'])) {
            $this->loadDefaultValuesFosUser($container);
        }

        if (isset($bundles['LiipImagineBundle'])) {
            $this->loadDefaultValuesLiipImagine($container);
        }

        if (isset($bundles['KnpSnappyBundle'])) {
            $this->loadDefaultValuesKnpSnappy($container);
        }
    }

    protected function loadDefaultValuesTwig(ContainerBuilder $container)
    {
        $configs = $this->loadYml('twig.yml');
        foreach ($container->getExtensions() as $name => $extension) {
            if ($name == 'twig') {
                $container->prependExtensionConfig($name, $configs);
                break;
            }
        }
    }

    protected function loadDefaultValuesFosUser(ContainerBuilder $container)
    {
        $configs = $this->loadYml('fosuser.yml');
        foreach ($container->getExtensions() as $name => $extension) {
            if ($name == 'fos_user') {
                $container->prependExtensionConfig($name, $configs);
                break;
            }
        }
    }

    protected function loadDefaultValuesLiipImagine(ContainerBuilder $container)
    {
        $configs = $this->loadYml('imagine.yml');
        foreach ($container->getExtensions() as $name => $extension) {
            if ($name == 'liip_imagine') {
                $container->prependExtensionConfig($name, $configs);
                break;
            }
        }
    }

    protected function loadDefaultValuesKnpSnappy(ContainerBuilder $container)
    {
        $configs = $this->loadYml('snappy.yml');
        foreach ($container->getExtensions() as $name => $extension) {
            if ($name == 'knp_snappy') {
                $container->prependExtensionConfig($name, $configs);
                break;
            }
        }
    }

    protected function loadYml($name)
    {
        try {
            $configs = Yaml::parse(file_get_contents(__DIR__ . '/../Resources/config/plugins/' . $name));
            return $configs;
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        return [];
    }
}
